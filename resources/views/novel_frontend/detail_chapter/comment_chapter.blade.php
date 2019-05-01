@foreach ($chapter_comment as $element)
    <div class="item delete_comment_{{ $element->dncc_id }}">
        <div class="user">                                
            <figure>
                @if ($element->m_image != null)
                    <img src="{{ asset('/storage/app/'.$element->m_image) }}?{{ time() }}">
                @else
                    <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" >
                @endif
            </figure>
            <div class="details">
                <h5 class="name">{{ $element->m_username }}</h5>
                <div class="time">{{ date('d F Y',strtotime($element->dncc_created_at)) }} <small>{{ date('h:i:s A',strtotime($element->dncc_created_at)) }}</small></div>
                <div class="description">
                    {!! $element->dncc_message !!}
                </div>
                <footer>
                    <br>
                    @if (auth::user() != null)
                        <button type="button" class="btn btn-sm btn-primary reply_{{ $element->dncc_id }}" onclick="reply({{ $element->dncc_id }})"><i class="fas fa-share"></i> Reply</button>
                        @if ($element->dncc_comment_by == auth::user()->m_id)
                        <button type="button" class="btn btn-sm btn-danger delreply_{{ $element->dncc_id }}" onclick="delreply({{ $element->dncc_id }})"><i class="fas fa-times"></i> Delete</button>
                        @endif
                    @endif
                </footer>
            </div>
        @foreach ($chapter_reply as $gg)
        @if ($gg->dnccdt_comment_id == $element->dncc_id)
        <div class="reply-list delete_comment_dt_{{ $gg->dnccdt_id }}">
            <div class="item">
                <div class="user">                                
                    <figure>
                        @if ($gg->m_image != null)
                            <img src="{{ asset('/storage/app/'.$gg->m_image) }}?{{ time() }}">
                        @else
                            <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" >
                        @endif
                    </figure>
                    <div class="details">
                        <h5 class="name">{{ $gg->m_username }}</h5>
                        <div class="time">{{ date('d F Y',strtotime($gg->dnccdt_created_at)) }} <small>{{ date('h:i:s A',strtotime($gg->dnccdt_created_at)) }}</small></div>
                        <div class="description">
                            {!! $gg->dnccdt_message !!}
                        </div>
                        @if (auth::user() != null)
                            @if ($element->dncc_comment_by == auth::user()->m_id)
                            <button type="button" class="btn btn-sm btn-danger delreply_{{ $gg->dnccdt_id }}" onclick="deldtreply({{ $gg->dnccdt_id }})"><i class="fas fa-times"></i> Delete</button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @else
        @endif
        @endforeach
        <div class="drop_reply_{{ $element->dncc_id }}">
            
        </div>
        </div>
    </div>
@endforeach