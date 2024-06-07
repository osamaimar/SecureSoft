<html>
@if (session()->has('success'))
<div class="toast-container position-fixed top-1 end-0 p-3">
    <div class="alert alert-success alert-dismissible shadow-sm toast d-flex align-items-center" aria-live="assertive" aria-atomic="true" id="success-Toast" role="alert" style="background-color: rgb(235,248,244); border-color: rgb(223,245,236);">
        <svg class="flex-shrink-0 me-2 svg-success" xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000">
            <path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none" />
            <path d="M16.59 7.58L10 14.17l-3.59-3.58L5 12l5 5 8-8zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z" />
        </svg>
        <div>{{ session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x text-right"></i></button>
    </div>
</div>
@elseif (session()->has('purchase'))
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="purchase-Toast" class="toast colored-toast bg-secondary-transparent" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-secondary text-fixed-white">
            <img class="bd-placeholder-img rounded me-2" src="{{asset(App\Models\Settings::first()->dark_icon)}}" alt="...">
            <strong class="me-auto">Completed</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-white">
            {{session('purchase')}}
        </div>
    </div>
</div>
@elseif (session()->has('favorite'))
<div class="toast-container position-fixed top-1 end-0 p-3">
    <div class="alert alert-warning alert-dismissible shadow-sm toast d-flex align-items-center" aria-live="assertive" aria-atomic="true" id="favorite-Toast" role="alert" style="background-color: rgb(254,248,238); border-color: rgb(254,244,227);">
        <svg class="flex-shrink-0 me-2 svg-warning" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="1.5rem" viewBox="0 0 16 16" width="1.5rem" fill="#000000">
            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
        </svg>
        <div>{{ session('favorite') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x text-right"></i></button>
    </div>
</div>
@elseif (session()->has('warning'))
<div class="toast-container position-fixed top-1 end-0 p-3">
    <div class="alert alert-warning alert-dismissible shadow-sm toast d-flex align-items-center" aria-live="assertive" aria-atomic="true" id="warning-Toast" role="alert" style="background-color: rgb(254,248,238); border-color: rgb(254,244,227);">
        <svg class="flex-shrink-0 me-2 svg-warning" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000">
            <g>
                <rect fill="none" height="24" width="24" />
            </g>
            <g>
                <g>
                    <g>
                        <path d="M15.73,3H8.27L3,8.27v7.46L8.27,21h7.46L21,15.73V8.27L15.73,3z M19,14.9L14.9,19H9.1L5,14.9V9.1L9.1,5h5.8L19,9.1V14.9z" />
                        <rect height="6" width="2" x="11" y="7" />
                        <rect height="2" width="2" x="11" y="15" />
                    </g>
                </g>
            </g>
        </svg>
        <div>{{ session('warning') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x text-right"></i></button>
    </div>
</div>

@elseif (session()->has('delete'))
<div class="toast-container position-fixed top-1 end-0 p-3">
    <div class="alert alert-danger alert-dismissible shadow-sm toast d-flex align-items-center" aria-live="assertive" aria-atomic="true" id="delete-Toast" role="alert" style="background-color: rgb(253,237,235); border-color: rgb(253,226,223);">
        <svg class="flex-shrink-0 me-2 svg-danger" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="1.5rem" viewBox="0 0 16 16" width="1.5rem" fill="#000000">
            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
        </svg>
        <div>{{ session('delete') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x text-right"></i></button>
    </div>
</div>
@endif
<audio id="successSound">
    <source src="{{asset('/assets/sounds/success.mp3')}}" type="audio/mpeg">
</audio>
<audio id="purchaseSound">
    <source src="{{asset('/assets/sounds/purchase.mp3')}}" type="audio/mpeg">
</audio>
<audio id="warningSound">
    <source src="{{asset('/assets/sounds/error.mp3')}}" type="audio/mpeg">
</audio>
<audio id="deleteSound">
    <source src="{{asset('/assets/sounds/delete.mp3')}}" type="audio/mpeg">
</audio>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Success Toast
        var successToastElement = document.getElementById('success-Toast');
        if (successToastElement) {
            var successToast = new bootstrap.Toast(successToastElement, {
                delay: 3000
            });
            var x = document.getElementById('successSound');
            x.autoplay = true;
            x.muted = false
            x.load();

            successToast.show();
        }

        // purchase Toast
        var successToastElement = document.getElementById('purchase-Toast');
        if (successToastElement) {
            var successToast = new bootstrap.Toast(successToastElement, {
                delay: 5000
            });
            var x = document.getElementById('purchaseSound');
            x.autoplay = true;
            x.muted = false
            x.load();

            successToast.show();
        }

        // favorite Toast
        var successToastElement = document.getElementById('favorite-Toast');
        if (successToastElement) {
            var successToast = new bootstrap.Toast(successToastElement, {
                delay: 3000
            });
            var x = document.getElementById('successSound');
            x.autoplay = true;
            x.muted = false
            x.load();

            successToast.show();
        }
        // Warning Toast
        var dangerToastElement = document.getElementById('warning-Toast');
        if (dangerToastElement) {
            var dangerToast = new bootstrap.Toast(dangerToastElement, {
                delay: 3000
            });
            var x = document.getElementById('warningSound');
            x.autoplay = true;
            x.muted = false
            x.load();

            dangerToast.show();
        }

        // Delete Toast
        var dangerToastElement = document.getElementById('delete-Toast');
        if (dangerToastElement) {
            var dangerToast = new bootstrap.Toast(dangerToastElement, {
                delay: 3000
            });
            var x = document.getElementById('deleteSound');
            x.autoplay = true;
            x.muted = false
            x.load();

            dangerToast.show();
        }
    });
</script>