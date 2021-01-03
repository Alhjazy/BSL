<style>
    h1 {
        margin-top: 0;
        margin-bottom: 1em;
        font-size: 2.5em;
        max-width: 650px;
        line-height: 1.3;
    }
    .content-block {
        margin-bottom: 3em;
    }

    #tabs {
        margin-bottom: 2.6em;
        position: relative;
    }
    #tabs::before {
        content: '';
        position: absolute;
        bottom: 0;
        height: 1px;
        width: 100%;
        left: 0;
        background: #f1f1f1;
    }
    #tabs li {
        font-size: 1.05em;
        font-weight: 700;
        margin-right: 3em;
        padding-bottom: 0.6em;
        letter-spacing: 0.03em;
        display: inline-block;
        position: relative;
        cursor: pointer;
    }
    #tabs li.active {
        border-bottom: 4px solid #ffe553;
    }

    p {
        line-height: 1.6;
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2em;
    }

    .stars {
        font-size: 1.6em;
    }

    .label {
        color: #bfbfbf;
        letter-spacing: .08em;
        font-size: .65rem;
        font-weight: bold;
        display: block;
        margin-bottom: .7rem;
        text-transform: uppercase;
    }

    span.stars {
        font-size: 1.4em;
    }

    .body,
    .course-sidebar {
        min-height: 100vh;
    }

    .course-content {
        width: calc(100% - 320px);
        float: right;
        padding-right: 5em;
    }

    .courseSidebar {
        width: 230px;
        float: left;
        position: relative;
    }
    .courseSidebar__featureImage {
        /*padding-bottom: 100%;*/
        background: '/resources/profiles/EMP000'.{{$employee->username}}.'/'.{{$employee->personal_image}};
        margin-bottom: 3em;
    }

    .profile-image {
        position: relative;
        overflow: hidden;
        padding-bottom: 100%;
        border-radius: 100%;
        background: #f7f7f7;
    }
    .profile-image__inner {
        position: Absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        margin: 20px;
        border-radius: 100%;
        overflow: hidden;
    }
    .profile-image__inner::after {
        position: absolute;
        top: -1px;
        right: -1px;
        bottom: -1px;
        left: -1px;
        background: rgba(0, 0, 0, 0.2);
        content: '';
    }
    .profile-image img {
        height: 100%;
        width: 100%;
        -o-object-fit: cover;
        object-fit: cover;
    }

    .panel {
        margin: 2em 0;
        background: white;
        padding: 4em 10em 4em 5.5em;
        position: relative;
        border-radius: 5px;
        box-shadow: 0 0 7px 0px rgba(0, 0, 0, 0.07), 0 0 55px rgba(0, 0, 0, 0.06);
    }

    .courseStats {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .courseStats li {
        margin-bottom: 2.8rem;
    }
    .courseStats__label {
        background: white;
        position: relative;
        margin-bottom: -4px;
        float: left;
        padding-right: 5px;
    }
    .courseStats__divider {
        float: left;
        height: 1px;
        background: #e6e6e6;
        width: 100%;
        display: block;
        margin-bottom: 1.4rem;
    }
    .courseStats__data {
        display: block;
        font-weight: 700;
        font-size: 1.05rem;
    }

    #tab li:not(.active) {
        display: none;
    }

    .button {
        padding: 15px 20px;
        font-weight: 700;
        background: #f3f3f3;
        color: darket(#f3f3f3, 26%);
        display: inline-block;
        margin: 0 .8em .8em 0;
    }
    .button:first-child {
        margin-left: 0;
    }
    .button.button--booking {
        background: #ffe553;
        color: #cdae00;
    }
</style>
<div class="sm:p-7 p-4 ">
    <div class="course-content">
        <h1>{{$employee->name}}</h1>
        <hr>

        <h1>Managing Work at Height</h1>

        <div class="content-block">
            <span class="label">HoundRank</span>
            <span class="stars">★★★☆☆</span>
        </div>

        <div class="content-block">
            <a class="button button--booking">Book Course</a>
            <a class="button button--download">Download PDF</a>
        </div>

        <div class="content-block">
            <ul id="tabs">
                <li class="active">Description</a>
                <li>Location</a>
                <li>Gallery</a>
                <li>Reviews</a>
                <li>Pricing</a>

            </ul>


            <ul id="tab">
                <li class="active">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Moatibus amet quisquam accus, porro, alias sed distinctio. necessitatibus amet quisquam accusamus minus rederit cum dolores ab ratione, porro, alias sed distinctio.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quo, culpa susc ipsum assumenda odio doloribus necessitatibus amequam porro, alias sed distinct. necessitatibus quisquam accusamus minus reprehenderit cum dolores ab ratione, porro,as
                        sed distinctio.</p>
                </li>
                <li>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Moatibus ametoijoj ioj iuh accusamus minus rederit cum dolores ab ratione, poruiyg ro, alias sed distinctio.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quo, culpa susc ipsum as sed distinct. neceby tbatibus quisquam ac byuu minus reprehenderit cum dolores ab ratione, porro,as sed distinctio.</p>
                </li>
                <li>
                    <p>Luy uy lor sit amet, c ur adipisicing elit. Moatibus amet quisquam accus, porro, alias sed distinctio. necessitatibus hui reprehenderit cum dolores ab ratione, porro,as sed distinctio.</p>
                </li>
                <li>
                    <p>ipsum dolor sit amet, consectetur adipisicing elit. Moatibus quisquam accus, imiinus rederit cum dolores ab ratione, porro, alias sed distinctio.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quo, culpa susc ipsum assumes sed distinct. necessitatibuo joij oij bhuohb ouyone, porro,as sed distinctio.</p>
                </li>


            </ul>
        </div>
    </div>
    <aside class="courseSidebar">
        <img class="courseSidebar__featureImage" src="/resources/employees/profiles/{{$employee->username}}/{{$employee->personal_image}}" alt="{{$employee->username}}">
        <ul class="courseStats">
            <li>
                <span class="label courseStats__label">Provider</span>
                <span class="courseStats__divider"></span>
                <span class="courseStats__data">Leading Edge Safety</span>
            </li>
            <li>
                <span class="label courseStats__label">Duration</span>
                <span class="courseStats__divider"></span>
                <span class="courseStats__data">Half Day</span>
            </li>
            <li>
                <span class="label courseStats__label">Suitable For</span>
                <span class="courseStats__divider"></span>
                <span class="courseStats__data">Managers</span>
            </li>
            <li>
                <span class="label courseStats__label">Subject</span>
                <span class="courseStats__divider"></span>
                <span class="courseStats__data">Working At Height</span>
            </li>
        </ul>
    </aside>
    <div class="tools">
        <a class="tools__"></a>
        <a class=""></a>
        <a></a>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("ul#tabs li").click(function(e){
            if (!$(this).hasClass("active")) {
                var tabNum = $(this).index();
                var nthChild = tabNum+1;
                $("ul#tabs li.active").removeClass("active");
                $(this).addClass("active");
                $("ul#tab li.active").removeClass("active");
                $("ul#tab li:nth-child("+nthChild+")").addClass("active");
            }
        });
    });
    function load(url) {
        $('#AjaxShowContent').load(url, function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")

                if(statusTxt == "error")
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    }
</script>
