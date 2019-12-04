<?php
function path(){
    if(isset(Auth::user()->userDetail->image))
    {
        return asset('admin/images/'.Auth::user()->userDetail->image);
    }
    else
    {
        return asset('admin/images/public.jpg');
    }

}
?>