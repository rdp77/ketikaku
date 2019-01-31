                                    @foreach ($novel_rate as $element)
                                        <div class="item">
                                            <div class="user">                                
                                                <figure>
                                                    @if ($element->m_image != null)
                                                        <img src="{{ asset('assets/images/img01.jpg') }}">
                                                    @else
                                                        <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" >
                                                    @endif
                                                </figure>
                                                <div class="details">
                                                    <h5 class="name">{{ $element->m_username }}  
                                                        @if ($element->dr_rate == 1)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 2)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 3)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 4)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="far fa-star kuning"></i>
                                                        @elseif ($element->dr_rate == 5)
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                            <i class="fas fa-star kuning"></i>
                                                        @endif
                                                    </h5>
                                                    <div class="time">{{ date('d F Y',strtotime($element->dr_created_at)) }} <small>{{ date('h:i:s A',strtotime($element->dr_created_at)) }}</small></div>
                                                    <div class="description">
                                                        {{ $element->dr_message }}
                                                    </div>
                                                    <footer>

                                                        <br>
                                                        <button type="button" class="btn btn-sm btn-primary reply_{{ $element->dr_id }}" onclick="reply({{ $element->dr_id }})"><i class="fas fa-share"></i> Reply</button>
                                                        {{-- <a href="#">Reply</a> --}}
                                                    </footer>
                                                </div>
                                            @foreach ($novel_reply as $gg)
                                            @if ($gg->drdt_ref_rate_id == $element->dr_id)
                                            <div class="reply-list">
                                                <div class="item">
                                                    <div class="user">                                
                                                        <figure>
                                                            @if ($element->m_image != null)
                                                                <img src="{{ asset('assets/images/img01.jpg') }}">
                                                            @else
                                                                <img src="{{ asset('assets_backend/images/no_image.png') }}?{{ time() }}" >
                                                            @endif
                                                        </figure>
                                                        <div class="details">
                                                            <h5 class="name">{{ $gg->m_username }}</h5>
                                                            <div class="time">{{ date('d F Y',strtotime($gg->drdt_created_at)) }} <small>{{ date('h:i:s A',strtotime($gg->drdt_created_at)) }}</small></div>
                                                            <div class="description">
                                                                {{ $gg->drdt_message }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            @endif
                                            @endforeach
                                            <div class="drop_reply_{{ $element->dr_id }}">
                                                
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
