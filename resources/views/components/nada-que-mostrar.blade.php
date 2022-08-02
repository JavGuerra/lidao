@props(['img' => '', 'msg' => 'Nothing to show'])
<div class="mt-3 py-10 flex justify-center"> @include($img) </div>
<div class="text-center text-2xl text-gray-500 dark:text-gray-400 mb-10">{{ __( $msg ) }}</div>