<?php

namespace App;

class Profile {
    public $header;
    public $profile;

    public function __construct($header, $profile)
    {
        $this->header = $header;
        $this->profile = $profile;
    }

    public static function virtual(){
        return new self(self::defaultHeaderUrl(), self::defaultProfileUrl());
    }

    public static function defaultHeaderUrl(){
        return "/header_default.png";
    }

    public static function defaultProfileUrl(){
        return "/profile_default.png";
    }
}
