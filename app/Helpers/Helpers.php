<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Rakibhstu\Banglanumber\NumberToBangla;


//Start
const CITIZENSHIP_CERTIFICATE_STATUS_PENDING = 1;
const CITIZENSHIP_CERTIFICATE_STATUS_APPROVED = 2;
const CITIZENSHIP_CERTIFICATE_STATUS_CANCELLED = 3;
//End

function saveImage($destination, $attribute): string
{
    $file_name = time() . '-' . $attribute->getClientOriginalName();
    $path = 'uploads/' . $destination . '/' . $file_name;
    $attribute->move(public_path('uploads/' . $destination . '/'), $file_name);
    return $path;
}

function deleteFile($path)
{
    File::delete($path);
}

function getFile($file)
{
    return asset($file);
}


function numberParser($value)
{
    return (float)str_replace(',', '', number_format(($value), 2));
}

function en2bnNumber($number)
{
    if (!$number) {
        return 0 . ' টাকা';
    }
    $arrFrom = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $arrTo = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    return str_replace($arrFrom, $arrTo, $number) . ' টাকা';
}

function en2bn($number)
{
    $arrFrom = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $arrTo = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    return str_replace($arrFrom, $arrTo, $number);
}

function getDateFormat($value)
{
    return \Carbon\Carbon::parse($value)->format('d M Y');
}

function getDateYear($value)
{
    return \Carbon\Carbon::parse($value)->format('Y');
}

function getDateMonth($value)
{
    return \Carbon\Carbon::parse($value)->format('m');
}

function getBanglaDateFormat($value)
{
    $date = \Carbon\Carbon::parse($value)->format('d M Y');
    $numberFrom = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $numberTo = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $date  = str_replace($numberFrom, $numberTo, $date);

    $en_months_from = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $bn_months_to = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

    $date  = str_replace($en_months_from, $bn_months_to, $date);
    return $date;
}

function getBanglaMonth($value)
{
    $en_months_from = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $bn_months_to = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

    $month  = str_replace($en_months_from, $bn_months_to, $value);
    return $month;
}

function numberBnWord($value)
{
    $num = new NumberToBangla();
    $text = $num->bnWord($value);
    return $text;
}


function getOption($option_key)
{
    $system_settings = config('settings');

    if ($option_key && isset($system_settings[$option_key])) {
        return $system_settings[$option_key];
    } else {
        return '';
    }
}
