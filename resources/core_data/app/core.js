$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function unLoadingContentAjaxBlock() {
    $('div.content').removeClass('lock-background').find('div.loading-block').remove();
}
function loadingContentAjaxBlock() {
    $('div.content').addClass('lock-background');
    // $('div.content div.top-content').hide();
    $('div.content').prepend('' +
        '<div  class="loading-block col-span-6 sm:col-span-3 xl:col-span-2 flex flex-col justify-end items-center ">\n' +
        '                        \n' +
        '                    <svg width="20" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20">\n' +
        '                        <defs>\n' +
        '                            <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">\n' +
        '                                <stop stop-color="rgb(45, 55, 72)" stop-opacity="0" offset="0%"></stop>\n' +
        '                                <stop stop-color="rgb(45, 55, 72)" stop-opacity=".631" offset="63.146%"></stop>\n' +
        '                                <stop stop-color="rgb(45, 55, 72)" offset="100%"></stop>\n' +
        '                            </linearGradient>\n' +
        '                        </defs>\n' +
        '                        <g fill="none" fill-rule="evenodd">\n' +
        '                            <g transform="translate(1 1)">\n' +
        '                                <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="3">\n' +
        '                                    <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>\n' +
        '                                </path>\n' +
        '                                <circle fill="rgb(45, 55, 72)" cx="36" cy="18" r="1">\n' +
        '                                    <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.9s" repeatCount="indefinite"></animateTransform>\n' +
        '                                </circle>\n' +
        '                            </g>\n' +
        '                        </g>\n' +
        '                    </svg>\n' +
        '                 \n' +
        '                        <div class="text-center  text-xs mt-2">Loading...</div>\n' +
        '                    </div>');
}

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {

});