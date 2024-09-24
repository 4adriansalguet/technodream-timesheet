{{-- ERRORS MESSAGE --}}
@if ($errors->any())
    <div class="alert-container">
        <div class="alert-error">
            <div class="alert-header">
                <i class='bx bx-error-circle'></i>
            </div>
            <div class="alert-body">
                <ul>
                    @php $counter = 0; @endphp
                    @foreach ($errors->all() as $error)
                        @php $counter++; @endphp
                          <li><small>{{ $error }}</small></li>
                    @endforeach
                </ul>
            </div>
            <div class="alert-footer">
                <button class="alert-close">Ok</button>
            </div>
        </div>
    </div>
@endif

{{-- session MESSAGE --}}
@if(session()->has('message'))
    <div class="alert-container">
        <div class="alert-success">
            <div class="alert-header">
                <i class='bx bx-check-circle'></i>
            </div>
            <div class="alert-body">
                <small>{{ session()->get('message') }}</small>
            </div>
            <div class="alert-footer">
                <button class="alert-close">Ok</button>
            </div>
        </div>
    </div>
@endif

{{-- session MESSAGE --}}
@if(session()->has('warning'))
    <div class="alert-container">
        <div class="alert-error">
            <div class="alert-header">
                <i class='bx bx-error-circle'></i>
            </div>
            <div class="alert-body">
                <small>{{ session()->get('warning') }}</small>
            </div>
            <div class="alert-footer">
                <button class="alert-close">Ok</button>
            </div>
        </div>
    </div>
@endif