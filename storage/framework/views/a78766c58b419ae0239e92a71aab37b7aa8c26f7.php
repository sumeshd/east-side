

<?php $__env->startSection('content'); ?>

<h2>  <a href="<?php echo e(url('settingsview')); ?>" class="combtnDiv"> View Settings </a> </h2>
            <div class="boxthree">
              <ul>
                <li> <a href="<?php echo e(url('presales')); ?>"> Presales </a> </li>
                <li class="active"> <a href="<?php echo e(url('postsales')); ?>"> Postsales </a> </li>
                <li> <a href="<?php echo e(url('execution')); ?>"> Execution </a> </li>
              </ul>
            </div>
            <div class="progressDiv">
              <div class="row">
                <div class="col-md-12">
      
                    <form id="add-item">
                        <input type="text" name="name" placeholder="Name">
                        <a href="#" class="btn btn-white view"> <img src="<?php echo e(url('assets/images/icon/view-svgrepo-com.svg')); ?>" alt="icon" style="width:17px;"></a>
                        <a href="#" class="btn btn-white upload"><img src="<?php echo e(url('assets/images/icon/upload-svgrepo-com.svg')); ?>" alt="icon" style="width:17px;"></a>
                        <a href="#" class="btn btn-white download"><img src="<?php echo e(url('assets/images/icon/download-svgrepo-com.svg')); ?>" alt="icon" style="width:17px;"></a>
                        <a href="#" class="btn btn-white comments"><img src="<?php echo e(url('assets/images/icon/comment-svgrepo-com.svg')); ?>" alt="icon" style="width:17px;"></a>
                        
                        <input type="hidden" name="view" value=0 id="view">
                        <input type="hidden" name="upload" value=0 id="upload">
                        <input type="hidden" name="download" value=0 id="download">
                        <input type="hidden" name="comments" value=0 id="comments">

                        
                        <button class="btn btn-primary btn-lg" type="submit">Add Menu</button>
                    </form>

                    <hr />

                    <div class="dd" id="nestable">

                         <?php echo (empty($html)) ? ' <ol class="dd-list"></ol>' : $html; ?>

                    </div>


                    <hr />
                    <form action="<?php echo e(url('postsalesstore')); ?>" >
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="nestable-output" name="menu">
                        <button class="btn btn-success btn-lg" type="submit">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>





<?php $__env->startSection('footer'); ?>
<!-- <script src="<?php echo e(url('assets/custom_create_js/categoryjs/jquery-3.4.1.min.js')); ?>"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script src="<?php echo e(url('assets/custom_create_js/categoryjs/jquery.nestable.js')); ?>"></script>


 <script type="text/javascript">

    $(document).ready(function () {

    var updateOutput = function () {
        $('#nestable-output').val(JSON.stringify($('#nestable').nestable('serialize')));
    };

    $('#nestable').nestable().on('change', updateOutput);

    updateOutput();


    $("#add-item").submit(function (e) {
        e.preventDefault();
        id = Date.now();
        var label = $("#add-item > [name='name']").val();
        var view = $("#add-item > [name='view']").val();
        var upload = $("#add-item > [name='upload']").val();
        var download = $("#add-item > [name='download']").val();
        var comments = $("#add-item > [name='comments']").val();
        
        if(view == 0 ){
            var view_tf = "";
        }else{
            var view_tf = "<a href='#' class='btn btn-success'> <img src=<?php echo e(url('assets/images/icon/view-svgrepo-com.svg')); ?> alt='icon' style='width:17px;'></a>";
        }

        if(upload == 0 ){
            var upload_tf = "";
        }else{
            var upload_tf = "<a href='#' class='btn btn-success'> <img src=<?php echo e(url('assets/images/icon/upload-svgrepo-com.svg')); ?> alt='icon' style='width:17px;'></a>";
        }

        if(download == 0 ){
            var download_tf = "";
        }else{
            var download_tf = "<a href='#' class='btn btn-success'> <img src=<?php echo e(url('assets/images/icon/download-svgrepo-com.svg')); ?> alt='icon' style='width:17px;'></a>";
        }

        if(comments == 0 ){
            var comments_tf = "";
        }else{
            var comments_tf = "<a href='#' class='btn btn-success'> <img src=<?php echo e(url('assets/images/icon/comment-svgrepo-com.svg')); ?> alt='icon' style='width:17px;'></a>";
        }



        if (label == "") return;
        var item =
            '<li class="dd-item dd3-item" data-id="' + id + '" data-label="' + label + '" data-view="' + view + '" data-upload="' + upload + '" data-download="' + download + '" data-comments="' + comments + '">' +
            '<div class="dd-handle dd3-handle" > Drag</div>' +
            '<div class="dd3-content"><span>' + label +' '+ view_tf+' '+ upload_tf +' ' + download_tf +' ' + comments_tf +'</span>' +
            '<div class="item-edit">Edit</div>' +
            '</div>' +
            '<div class="item-settings d-none">' +
            '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' + label + '"></label></p>' +            
            '<p><a class="item-delete" href="javascript:;">Remove</a> |' +
            '<a class="item-close" href="javascript:;">Close</a></p>' +
            '</div>' +
            '</li>';

        $("#nestable > .dd-list").append(item);
        $("#nestable").find('.dd-empty').remove();
        $("#add-item > [name='name']").val('');
            $('#view').val(0);
            $('.view').removeClass("btn btn-white");
            $('.view').removeClass("btn btn-success");
            $('.view').addClass("btn btn-white");
            $('#upload').val(0);
            $('.upload').removeClass("btn btn-white");
            $('.upload').removeClass("btn btn-success");
            $('.upload').addClass("btn btn-white");
            $('#download').val(0);
            $('.download').removeClass("btn btn-white");
            $('.download').removeClass("btn btn-success");
            $('.download').addClass("btn btn-white");
            $('#comments').val(0);
            $('.comments').removeClass("btn btn-white");
            $('.comments').removeClass("btn btn-success");
            $('.comments').addClass("btn btn-white");
        
        updateOutput();
    });

    $("body").delegate(".item-delete", "click", function (e) {
        $(this).closest(".dd-item").remove();
        updateOutput();
    });

      


    $("body").delegate(".item-edit, .item-close", "click", function (e) {
        var item_setting = $(this).closest(".dd-item").find(".item-settings");
        if (item_setting.hasClass("d-none")) {
            item_setting.removeClass("d-none");
        } else {
            item_setting.addClass("d-none");
        }
    });

    $("body").delegate("input[name='navigation_label']", "change paste keyup", function (e) {
        $(this).closest(".dd-item").data("label", $(this).val());
        $(this).closest(".dd-item").find(".dd3-content span").text($(this).val());
    });

    $("body").delegate(".view", "click", function () {
        var view =$('#view').val();
        if(view == 0){
            $('#view').val(1);
            $('.view').removeClass("btn btn-white");
            $('.view').addClass("btn btn-success");
        }else if(view == 1){
            $('#view').val(0);
            $('.view').removeClass("btn btn-success");
            $('.view').addClass("btn btn-white");
        }
    });
    $("body").delegate(".upload", "click", function () {
        var upload =$('#upload').val();
        if(upload == 0){
            $('#upload').val(1);
            $('.upload').removeClass("btn btn-white");
            $('.upload').addClass("btn btn-success");
        }else if(upload == 1){
            $('#upload').val(0);
            $('.upload').removeClass("btn btn-success");
            $('.upload').addClass("btn btn-white");
        }
    });
    $("body").delegate(".download", "click", function () {
        var download =$('#download').val();
        if(download == 0){
            $('#download').val(1);
            $('.download').removeClass("btn btn-white");
            $('.download').addClass("btn btn-success");
        }else if(download == 1){
            $('#download').val(0);
            $('.download').removeClass("btn btn-success");
            $('.download').addClass("btn btn-white");
        }
    });
    $("body").delegate(".comments", "click", function () {
        var comments =$('#comments').val();
        if(comments == 0){
            $('#comments').val(1);
            $('.comments').removeClass("btn btn-white");
            $('.comments').addClass("btn btn-success");
        }else if(comments == 1){
            $('#comments').val(0);
            $('.comments').removeClass("btn btn-success");
            $('.comments').addClass("btn btn-white");
        }
    });
  

});
   
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('settings_master.index_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Indranil Dhar\Desktop\East Side 29.05.2022\east-side\resources\views/settings_master/postsales.blade.php ENDPATH**/ ?>