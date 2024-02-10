<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\AvatarHash;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AvatarController extends Controller
{

    protected $size;
    protected $image_path;

    public function index()
    {
        return view('avatar.index', [
            'avatars' => Avatar::orderBy('sex')->orderBy('number')->paginate(20),
        ]);
    }

    public function show()
    {
        $sex = $this->getSex();
        $hash = request('h') ? md5(request('h')) : md5(now());
        $this->size = $this->getSize(request('d'));

        $this->image_path = $this->getImageIdByHash($hash, $sex);

        $img = Image::cache(function ($image) {
            return $image->make(storage_path('app/' . Avatar::find($this->image_path)->path))
                ->resize($this->size, $this->size);
        }, 60*24*365, true);

        $this->addRequest();

        return $img->response();

//        return Image::make(storage_path('app/' . Avatar::find($image)->path))->resize($size, $size)->response();
    }

    public function showid(Avatar $avatar)
    {
        $this->image_path = $avatar->path;

        $img = Image::cache(function ($image) {
            return $image->make(storage_path('app/' . $this->image_path))
                ->resize(150, 150);
        }, 60*24*365, true);

        return $img->response();
    }

    public function create()
    {
        return view('avatar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sex' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000000',
        ]);

        $count = 0;

        foreach ($request->file('images') as $file) {
            if ($this->checkDuplicate(md5_file($file))) {
                continue;
            }

            Avatar::create([
                'md5_hash' => md5_file($file),
                'path' => $file->store('avatars'),
                'number' => $this->getCount($request->sex) + 1,
                'sex' => $request->sex,
            ]);

            $count++;
        }

        return redirect()->route('avatar.index')->with('success', "Added {$count} avatars");
    }

    private function checkDuplicate($hash): bool
    {
        return Avatar::where('md5_hash', $hash)->exists();
    }

    private function getCount($sex): int
    {
        return Avatar::where('sex', $sex)->count();
    }

    private function getSex(): string
    {
        if (request('s') === 'm') {
            return 'm';
        }

        if (request('s') === 'f') {
            return 'f';
        }

        return rand(0, 1) ? 'm' : 'f';
    }

    private function getImageIdByHash($hash, $sex)
    {
        $image = AvatarHash::firstOrCreate([
            'md5_hash' => $hash,
            'sex' => $sex,
        ], [
            'sex' => $sex,
            'md5_hash' => $hash,
            'avatar_id' => $this->getAvatarId($hash, $sex)
        ]);

        return $image->avatar_id;
    }

    private function getAvatarId($hash, $sex)
    {
        $avatarCount = $this->getCount($sex); // The total number of avatars
        $numericValue = hexdec(substr($hash, 0, -25)); // Convert hexadecimal hash to a numeric value
        $id = $numericValue % $avatarCount;
        return Avatar::where('sex', $sex)->where('number', $id)->first()->id;
    }

    private function getSize($size = null): int
    {
        if (isset($size) && is_numeric($size) && $size >= 25 && $size <= 500) {
            return $size;
        }

        if ($size > 500) {
            return 500;
        }

        if (isset($size) && $size < 25) {
            return 25;
        }

        return 150;
    }

    private function addRequest()
    {
//        dd(request()->headers->get('referer'));

        $request = request();
        $referer = $request->headers->get('referer');
        $path = $request->getRequestUri();

        \App\Models\Request::create([
            'user_ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => $referer,
            'path' => $path,
            'avatar_id' => $this->image_path,
        ]);
    }

}
