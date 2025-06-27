@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://yt3.googleusercontent.com/4nZMrc-FA9CXWuSUIf6yERvhK3s9AKOShx-8l-TzWx0BEr78J56s9CdHsQGfn32-jCKsiymJjQ=s900-c-k-c0x00ffffff-no-rj" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
