<?php
?>


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Text</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">My fonts</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class='create-text-container border-bottom py-4 d-flex flex-column'>
        <button class='create-text-btn' data-id='Header' data-size='45' style='font-size: 26px'>Create header</button>
        <button class='create-text-btn' data-id='Sub Header' data-size='26' style='font-size: 18px'>Create sub header</button>
        <button class='mt-1 create-text-btn' data-id='Body Text' data-size='16' style='font-size: 14px'>Create body text</button>
    </div>
    <div class=''>
            <ul class='p-0 mb-0 grid-container2'>
                <li class='mb-3'>
                    <img src="img/text-img/dummy1.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy2.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy4.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy3.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy2.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy.png" alt="" width='100%' class='rounded'>
                </li>
                <li class='mb-3'>
                    <img src="img/text-img/dummy2.png" alt="" width='100%' class='rounded'>
                </li>
            </ul>
    </div>
</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

    <form action="" class='my-3'>
        <input type="file" value="Add new image" id="addFonts">
        <!-- <button id="upload_font_btn">Upload</button> -->
    </form>
    <ul class='p-0 font_list'>

    </ul>
  </div>
</div>





