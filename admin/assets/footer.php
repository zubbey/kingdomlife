<footer class="footer footer-black  footer-white ">
    <div class="container-fluid">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    <li>
                        <a href="https://www.ibrandacademy.com" target="_blank">Kingdom Life Gospel Outreaches</a>
                    </li>
                </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, Powered By <i class="fa fa-heart heart"></i> iBrand Africa Group
              </span>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<!--CONFIG-->
<script type='text/javascript' src='../config.js'></script>
<!--   Core JS Files   -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="./assets/js/core/jquery.min.js"></script>
<script src="./assets/js/core/popper.min.js"></script>
<script src="./assets/js/core/bootstrap.min.js"></script>
<script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Chart JS -->
<script src="./assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
<script src="./assets/js/jquery.inputFileText.js"></script>
<!-- Kingdom life Dashboard DEMO methods, don't include it in your project! -->
<script src="./assets/demo/demo.js"></script>
<script>
    const sk_key = config.PAYSTACK_SECRET_KEY;
    const dashboard = document.URL.indexOf("/dashboard") >= 0;
    const registered = document.URL.indexOf("/registered") >= 0;
    const testimonies = document.URL.indexOf("/testimonies") >= 0;
    const prayers = document.URL.indexOf("/prayers") >= 0;
    const givers = document.URL.indexOf("/givers") >= 0;
    const orders = document.URL.indexOf("/orders") >= 0;
    const task = document.URL.indexOf("/task") >= 0;
    const profile = document.URL.indexOf("/profile") >= 0;

    const dashboard_nav = document.querySelector('ul li.dashboard');
    const registered_nav = document.querySelector('ul li.registered');
    const testimonies_nav = document.querySelector('ul li.testimonies');
    const prayers_nav = document.querySelector('ul li.prayers');
    const givers_nav = document.querySelector('ul li.givers');
    const orders_nav = document.querySelector('ul li.orders');
    const task_nav = document.querySelector('ul li.task');
    const profile_nav = document.querySelector('ul li.profile');

    const title_el = document.querySelector("title");

    if(dashboard){
        title_el.innerHTML = "Kingdom life | Dashboard";
        dashboard_nav.classList.add('active');
    }
    if(registered){
        title_el.innerHTML = "Kingdom life | Members";
        registered_nav.classList.add('active');
    }
    if(testimonies){
        title_el.innerHTML = "Kingdom life | Testimonies";
        testimonies_nav.classList.add('active');
    }
    if(prayers){
        title_el.innerHTML = "Kingdom life | Prayers";
        prayers_nav.classList.add('active');
    }
    if(givers){
        title_el.innerHTML = "Kingdom life | Givers";
        givers_nav.classList.add('active');
    }
    if(orders){
        title_el.innerHTML = "Kingdom life | Orders";
        orders_nav.classList.add('active');
    }
    if(task){
        title_el.innerHTML = "Kingdom life | Tasks";
        task_nav.classList.add('active');
    }
    if(profile){
        title_el.innerHTML = "Kingdom life | Profile";
        profile_nav.classList.add('active');
    }
    setInterval("my_function();",5000);

    function my_function(){
        $('#logs').load(document.URL +  ' #logs');
        // window.location = location.href;
    }

    $(document).ready(function() {
        $('#fileToUpload').inputFileText({
            text: 'Change Course Image'
        });
        $('#fileToUploadAdd').inputFileText({
            text: 'Add Course Image'
        });
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });

    $(document).ready(function() {
        let max_fields      = 5; //maximum input boxes allowed
        let wrapper   		= $(".input_fields_wrap"); //Fields wrapper
        let add_button      = $(".add_field_button"); //Add button ID
        let wrapper2   		= $(".input_fields_wrap_2"); //Fields wrapper
        let add_button2     = $(".add_field_button_2"); //Add button ID

        let x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="form-row"><div class="form-group col"><div class="form-group"><input class="form-control" type="text" name="heading[]" placeholder="heading"/></div></div> <div class="form-group col"><div class="form-group"><input class="form-control" type="text" name="body[]" placeholder="body"/></div></div><a href="#" class="remove_field"><i class="nc-icon nc-simple-remove"></i></a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        });

        // add course outline

        $(add_button2).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper2).append('<div class="form-row"><div class="form-group col"><div class="form-group"><input class="form-control" type="text" name="heading2[]" placeholder="heading"/></div></div> <div class="form-group col"><div class="form-group"><input class="form-control" type="text" name="body2[]" placeholder="body"/></div></div><a href="#" class="remove_field"><i class="nc-icon nc-simple-remove"></i></a></div>'); //add input box
            }
        });

        $(wrapper2).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>
<script>
    function SelectText(element) {
        let doc = document,
            text = element,
            range, selection;
        if (doc.body.createTextRange) {
            range = document.body.createTextRange();
            range.moveToElementText(text);
            range.select();
        } else if (window.getSelection) {
            selection = window.getSelection();
            range = document.createRange();
            range.selectNodeContents(text);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    }
    window.onload = function() {
        let iconsWrapper = document.getElementById('icons-wrapper'),
            listItems = iconsWrapper.getElementsByTagName('li');
        for (let i = 0; i < listItems.length; i++) {
            listItems[i].onclick = function fun(event) {
                let selectedTagName = event.target.tagName.toLowerCase();
                if (selectedTagName == 'p' || selectedTagName == 'em') {
                    SelectText(event.target);
                } else if (selectedTagName == 'input') {
                    event.target.setSelectionRange(0, event.target.value.length);
                }
            }

            let beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
                beforeContent = beforeContentChar.charCodeAt(0).toString(16);
            let beforeContentElement = document.createElement("em");
            beforeContentElement.textContent = "\\" + beforeContent;
            listItems[i].appendChild(beforeContentElement);

            //create input element to copy/paste chart
            let charCharac = document.createElement('input');
            charCharac.setAttribute('type', 'text');
            charCharac.setAttribute('maxlength', '1');
            charCharac.setAttribute('readonly', 'true');
            charCharac.setAttribute('value', beforeContentChar);
            listItems[i].appendChild(charCharac);
        }
    };

    // for table filter
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue, pseudoCode;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    };


    // set testimony live

    $(document).on("click","#testCheckbox",function(){
        if($(this).prop("checked") == true){
            $('#goLive').get(0).submit();
        }
        else if($(this).prop("checked") == false){
            $('#goLive').get(0).submit();
        }
    });

    // $('#testCheckbox').click(function() {
    //     $('#goLive').get(0).submit();
    // });
</script>
<script>
    //################# CHECK URL PARAM FUNCTION ##################
    function queryParameters () {
        let result = {};
        let params = window.location.search.split(/\?|\&/);
        params.forEach( function(it) {
            if (it) {
                let param = it.split("=");
                result[param[0]] = param[1];
            }
        });
        return result;
    }
    const form = $('#taskForm');
    const modalTitle = document.querySelector('#title');
    const modalBody = $('#modalBody');
    const ModalBtn = $('#createBtn');
    const modalFooter = $('#modalFooter');

    if (queryParameters().add === "banner" || queryParameters().add === "bulletin" || queryParameters().add === "event" || queryParameters().add === "outreach" || queryParameters().add === "stock"){
        $('#taskModal').modal('show');
    }
    if (queryParameters().add === "banner"){
        $('a#banner')[0].click();
        modalTitle.innerHTML = "Add Banner";
        modalBody.append("" +
            "<p id=\"status\" class=\"p-0\">Only Upload 2488 x 876 (pixel) Image Dimension.</p>\n" +
            "<div class=\"form-group form-file-upload form-file-simple\">\n" +
            "<input type=\"text\" class=\"form-control inputFileVisible\" placeholder=\"Select Image...\">" +
            "<input type=\"file\" class=\"inputFileHidden\" id=\"bannerFile\" name=\"bannerimg\">\n" +
            "</div>");
        ModalBtn.on("click", function () {
            uploadBanner();
        });
    }
    if (queryParameters().add === "bulletin"){
        $('a#bulletin')[0].click();

        modalTitle.innerHTML = "Add Bulletin";
        modalBody.append("" +
            "<p id=\"status\" class=\"p-0\">Only Upload PNG, JPG OR PDF.</p>\n" +
            "<div class=\"form-group form-file-upload form-file-simple\">\n" +
            "<input type=\"text\" class=\"form-control inputFileVisible\" placeholder=\"Select a file...\">" +
            "<input type=\"file\" class=\"inputFileHidden\" id=\"bulletinFile\" name=\"bulletin\">\n" +
            "</div>");
        ModalBtn.on("click", function () {
            uploadBulletin();
        });
    }
    if (queryParameters().add === "event"){
        $('a#event')[0].click();
        modalTitle.innerHTML = "Add Events";
        modalBody.append("" +
            "<p id=\"status\" class=\"p-0\">Only Upload 2488 x 1830 (pixel) Image Dimension.</p>\n" +
            "<div class=\"form-group form-file-upload form-file-simple\">\n" +
            "<input type=\"text\" class=\"form-control inputFileVisible\" placeholder=\"Select a file...\">" +
            "<input type=\"file\" class=\"inputFileHidden\" id=\"eventImg\" name=\"eventimg\">\n" +
            "</div>" +
            "<div class=\"form-group\">\n" +
            "<label>Event Name</label>\n" +
            "<input type=\"text\" class=\"form-control\" id=\"eName\" name=\"eventname\" placeholder=\"Eg: Supernatural Intervention Hour\">\n" +
            "</div>" +
            "<div class=\"form-group\">\n" +
            "<label>Details</label>\n" +
            "<textarea type=\"text\" class=\"form-control\" id=\"eInfo\" name=\"eventinfo\" placeholder=\"Eg; Breaking of Family Ancient Barr...\"></textarea>\n" +
            "</div>" +
            "<div class=\"form-row\">\n" +
            "<div class=\"form-group col-md-6\">\n" +
            "<label>Event Time</label>\n" +
            "<input type=\"text\" class=\"form-control\" id=\"eTime\" name=\"eventtime\" placeholder=\"Eg: 10:00 AM\">\n" +
            "</div>\n" +
            "<div class=\"form-group col-md-6\">\n" +
            "<label>Event Date</label>\n" +
            "<input type=\"text\" class=\"form-control\" id=\"eDate\" name=\"eventdate\" placeholder=\"Eg: 12 Feb, 2020\">\n" +
            "</div>\n" +
            "</div>" +
            "<div class=\"form-group\">\n" +
            "<label>Event Value</label>\n" +
            "<input type=\"text\" class=\"form-control\" id=\"eVenue\" name=\"eventvenue\" placeholder=\"Eg: Jesus Cathedral Off Mark...\">\n" +
            "</div>");
        ModalBtn.on("click", function () {
            uploadEvent();
        });
        form.attr('method','POST');
    }
    if (queryParameters().add === "outreach"){
        $('a#outreach')[0].click();

        modalTitle.innerHTML = "Add Outreach";
        modalBody.append("" +
            "<p id=\"status\" class=\"p-0\">Only Upload 2488 x 1830 (pixel) Image Dimension.</p>\n" +
            "<div class=\"form-group form-file-upload form-file-simple\">\n" +
            "<input type=\"text\" class=\"form-control inputFileVisible\" placeholder=\"Select a file...\">" +
            "<input type=\"file\" class=\"inputFileHidden\" id=\"outreachImg\" name=\"outreachimg\">\n" +
            "</div>" +
            "<div class=\"form-group\">\n" +
            "<label>Outreach Name</label>\n" +
            "<input type=\"text\" class=\"form-control\" id=\"oName\" name=\"outreachname\" placeholder=\"Eg: Spirit Filled Bible Institute\">\n" +
            "</div>" +
            "<div class=\"form-group\">\n" +
            "<label>Details</label>\n" +
            "<textarea type=\"text\" class=\"form-control\" id=\"eInfo\" name=\"outreachinfo\" placeholder=\"Eg; Spirit Filled Bible Institute empower...\"></textarea>\n" +
            "</div>");
        ModalBtn.on("click", function () {
            uploadOutreach();
        });
        form.attr('method','POST');
    }
    if (queryParameters().add === "stock"){
        $('a#stock')[0].click();

        modalTitle.innerHTML = "Add Stock";
        modalBody.append("" +
            "<p id=\"status\" class=\"p-0\">Only Upload 649 x 429 (pixel) Image Dimension.</p>\n" +
            "<div class=\"form-group form-file-upload form-file-simple\">\n" +
            "<input type=\"text\" class=\"form-control inputFileVisible\" placeholder=\"Select a file...\">" +
            "<input type=\"file\" class=\"inputFileHidden\" id=\"stcokImg\" name=\"stcokimg\">\n" +
            "</div>" +
            "<div class=\"form-group\">\n" +
            "<label for=\"exampleFormControlSelect1\">Type</label>\n" +
            "<select name=\"producttype\" class=\"form-control\" id=\"exampleFormControlSelect1\">\n" +
            "<option selected>ebook</option>\n" +
            "<option>cd</option>\n" +
            "<option>dvd</option>\n" +
            "<option>audiobook</option>\n" +
            "</select>\n" +
            "  </div>" +
            "<div class=\"form-group\">\n" +
            "<label>Product Name</label>\n" +
            "<input type=\"text\" class=\"form-control\" id=\"sName\" name=\"productname\" placeholder=\"Eg: Solution-by-Revelation\">\n" +
            "</div>" +
            "<div class=\"form-group\">\n" +
            "<label>Product Price</label>\n" +
            "<input type=\"text\" class=\"form-control\" id=\"sPrice\" name=\"productprice\" placeholder=\"Eg; 1000\">\n" +
            "</div>");
        ModalBtn.on("click", function () {
            uploadStock();
        });
        form.attr('method','POST');
    }

    $('#bannerFile').on('change',function(){
        var fileName = $(this).val();
        $('.inputFileVisible').attr('value', fileName);
    });

    $('#bulletinFile').on('change',function(){
        var fileName = $(this).val();
        $('.inputFileVisible').attr('value', fileName);
    });

    $('#eventImg').on('change',function(){
        var fileName = $(this).val();
        $('.inputFileVisible').attr('value', fileName);
    });

    $('#outreachImg').on('change',function(){
        var fileName = $(this).val();
        $('.inputFileVisible').attr('value', fileName);
    });

    $('#stcokImg').on('change',function(){
        var fileName = $(this).val();
        $('.inputFileVisible').attr('value', fileName);
    });

    function uploadBanner(){
        var fd = new FormData();
        var files = $('#bannerFile')[0].files[0];
        fd.append('file',files);

        $.ajax({
            url: '../controller/add_banner.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response !== 0){
                    $("#status").html('<p class="text-success">'+response+'</p>');
                    window.location.assign('?success=ok');
                }else{
                    $("#status").html('<p class="text-danger">This Image can not be uploaded</p>');
                }
            },
        });
    }

    function uploadBulletin(){
        var fd = new FormData();
        var files = $('#bulletinFile')[0].files[0];
        fd.append('file',files);

        $.ajax({
            url: '../controller/add_bulletin.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response !== 0){
                    $("#status").html('<p class="text-success">'+response+'</p>');
                    modalFooter.html("" +
                        "<button onclick=\"location.assign('?saved=ok')\" type=\"button\" class=\"btn btn-success\" name=\"save\">Save Changes</button>");
                }else{
                    $("#status").html('<p class="text-danger">This File can not be uploaded</p>');
                }
            },
        });
    }

    function uploadEvent(){
        // var form = $('form')[0];
        var fd = new FormData(document.getElementById('taskForm'));
        var files = $('#eventImg')[0].files[0];
        fd.append('file',files);

        $.ajax({
            url: '../controller/add_event.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response !== 0){
                    $("#status").html('<p class="text-success">'+response+'</p>');

                    <?php if (isset($_SESSION['event_added'])): ?>
                    modalFooter.html("" +
                        "<button onclick=\"location.assign('?saved=ok')\" type=\"button\" class=\"btn btn-success\" name=\"save\">Save Changes</button>");
                    <?php endif; ?>
                }else{
                    $("#status").html('<p class="text-danger">This File can not be uploaded</p>');
                }
            },
        });
    }

    function uploadOutreach(){
        // var form = $('form')[0];
        var fd = new FormData(document.getElementById('taskForm'));
        var files = $('#outreachImg')[0].files[0];
        fd.append('file',files);

        $.ajax({
            url: '../controller/add_outreach.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response !== 0){
                    $("#status").html('<p class="text-success">'+response+'</p>');

                    <?php if (isset($_SESSION['outreach_added'])): ?>
                    modalFooter.html("" +
                        "<button onclick=\"location.assign('?saved=ok')\" type=\"button\" class=\"btn btn-success\" name=\"save\">Save Changes</button>");
                    <?php endif; ?>
                }else{
                    $("#status").html('<p class="text-danger">This File can not be uploaded</p>');
                }
            },
        });
    }

    function uploadStock(){
        // var form = $('form')[0];
        var fd = new FormData(document.getElementById('taskForm'));
        var files = $('#stcokImg')[0].files[0];
        fd.append('file',files);

        $.ajax({
            url: '../controller/add_stock.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response !== 0){
                    $("#status").html('<p class="text-success">'+response+'</p>');

                    <?php if (isset($_SESSION['stock_added'])): ?>
                    modalFooter.html("" +
                        "<button onclick=\"location.assign('?saved=ok')\" type=\"button\" class=\"btn btn-success\" name=\"save\">Save Changes</button>");
                    <?php endif; ?>
                }else{
                    $("#status").html('<p class="text-danger">This File can not be uploaded</p>');
                }
            },
        });
    }

    $('#status').bind("DOMSubtreeModified",function(){

        const msg = document.getElementById('msg').innerText;
        if (msg === "Please Note: All Text Field is Required!"){
            $(".form-group").addClass("has-danger");
            <?php if (isset($_SESSION['event_added']) || isset($_SESSION['outreach_added']) || isset($_SESSION['stock_added'])): ?>
                <?php unset($_SESSION['event_added'])?>
                <?php unset($_SESSION['outreach_added'])?>
                <?php unset($_SESSION['stock_added'])?>
            <?php endif; ?>
        } else if (msg === "New Event Has been Added Successfully" || msg === "New Outreach Has been Added Successfully" || msg === "New Stock Has been Added Successfully") {
            $(".form-group").removeClass("has-danger");
            $(".form-group").addClass("has-success");
            modalFooter.html("" +
                "<button onclick=\"location.assign('?saved=ok')\" type=\"button\" class=\"btn btn-success\" name=\"save\">Save Changes</button>");
        } else {
            $(".form-group").removeClass("has-danger");
        }
    });



    // redirect to currect page
    <?php if (isset($_SESSION['bulletin_created'])): ?>
    $('a#bulletin')[0].click();
    <?php unset($_SESSION['bulletin_created'])?>
    <?php endif; ?>
    // for success or error messages

    // FOR PROFILE ENTRY

    $("#profileForm :input").change(function() {
        $("#profileForm").data("changed",true);
        if ($("#profileForm").data("changed")) {
            // submit the form
            // $("#updateProfileBtn").prop('disabled', false);
            $("#updateProfileBtn").removeClass('disabled');
            // $("#updateProfileBtn").attr('type', 'submit');
            $("#updateProfileBtn").on('click', function () {
                $("#profileForm").get(0).submit();
            });
        }
    });


    if (queryParameters().success === "ok"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Image was added successfully!',
            showConfirmButton: false,
            timer: 3000
        });
        setTimeout(function(){
            let removePram = window.location.href;
            removePram = window.location.href.split("?")[0];
            window.location.assign(removePram);
        }, 3000);
    }
    if (queryParameters().saved === "ok"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Changes successfully Saved!',
            showConfirmButton: false,
            timer: 3000
        });
        setTimeout(function(){
            let removePram = window.location.href;
            removePram = window.location.href.split("?")[0];
            window.location.assign(removePram);
        }, 3000);
    }
    if (queryParameters().success === "deleted"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Deleted successfully!',
            showConfirmButton: false,
            timer: 1000
        });
        setTimeout(function(){
            let removePram = window.location.href;
            removePram = window.location.href.split("?")[0];
            window.location.assign(removePram);
        }, 1000);
    }
    if (queryParameters().error === "true"){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'There was an error, please check your connection!',
            showConfirmButton: false,
            timer: 1000
        });
        setTimeout(function(){
            let removePram = window.location.href;
            removePram = window.location.href.split("?")[0];
            window.location.assign(removePram);
        }, 1000);
    }
    if (queryParameters().error === "notdeleted"){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Something went wrong while updating your profile! check your connection & try again.',
            showConfirmButton: false,
            timer: 3000
        });
        setTimeout(function(){
            let removePram = window.location.href;
            removePram = window.location.href.split("?")[0];
            window.location.assign(removePram);
        }, 3000);
    }

    if (queryParameters().q === 0 || queryParameters().q === 1){
        setTimeout(function(){
            let removePram = window.location.href;
            removePram = window.location.href.split("?")[0];
            window.location.assign(removePram);
        }, 500);
    }

</script>
</body>

</html>