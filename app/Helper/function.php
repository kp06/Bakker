<?php
function path(){
    if(isset(Auth::user()->userDetail->image))
    {
        return('admin/images/'.Auth::user()->userDetail->image);
    }
    else
    {
        return('admin/images/public.jpg');
    }

}
?>