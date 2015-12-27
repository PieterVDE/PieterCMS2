@if($content->type == "YouTube")
    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $content->body }}"
            frameborder="0" allowfullscreen></iframe>
@elseif($content->type == "Vimeo")
    <iframe src="https://player.vimeo.com/video/{{ $content->body }}?badge=0" width="560"
            height="280" frameborder="0" allowfullscreen></iframe>
@elseif($content->type == "Soundcloud")
    <iframe width="100%" height="166" scrolling="no" frameborder="no"src="http://w.soundcloud.com/player/?url={{ $content->body }}&auto_play=false&color=915f33&theme_color=00FF00"></iframe>
@else
    <img src="{{ $content->body }}" alt="Placeholder">
@endif
