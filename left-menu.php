<?php
$url = basename($_SERVER['PHP_SELF']);
?>

<div class='left-menu d-flex position-relative'>

    <div class='left-menu-icon border-end'>
        <ul class="nav d-block" id="myTab" role="tablist">
            <li class="nav-item " role="presentation">
                <button class="nav-link active m-0 py-4 px-0 w-100" id="Template-tab" data-bs-toggle="tab"
                    data-bs-target="#Template" type="button" role="tab" aria-controls="home" aria-selected="true"><span
                        icon="control" aria-hidden="true" class="d-block"><svg data-icon="control" width="16"
                            height="16" viewBox="0 0 16 16">
                            <path
                                d="M13 8H8v5h5V8zm0-5H8v4h5V3zm2-3H1C.45 0 0 .45 0 1v14c0 .55.45 1 1 1h14c.55 0 1-.45 1-1V1c0-.55-.45-1-1-1zm-1 14H2V2h12v12zM7 3H3v10h4V3z"
                                fill-rule="evenodd"></path>
                        </svg></span>Template</button>
            </li>
            <li class="nav-item remove-search-bar " role="presentation">
                <button class="nav-link m-0 py-4 px-0 w-100" id="Text-tab" data-bs-toggle="tab" data-bs-target="#Text"
                    type="button" role="tab" aria-controls="profile" aria-selected="false"><span icon="new-text-box"
                        aria-hidden="true" class="d-block"><svg data-icon="new-text-box" width="16" height="16"
                            viewBox="0 0 16 16">
                            <path
                                d="M5 6.5c0 .28.22.5.5.5H7v3.5c0 .28.22.5.5.5s.5-.22.5-.5V7h1.5c.28 0 .5-.22.5-.5S9.78 6 9.5 6h-4c-.28 0-.5.22-.5.5zM15 2h-1V1c0-.55-.45-1-1-1s-1 .45-1 1v1h-1c-.55 0-1 .45-1 1s.45 1 1 1h1v1c0 .55.45 1 1 1s1-.45 1-1V4h1c.55 0 1-.45 1-1s-.45-1-1-1zm-2 5c-.55 0-1 .45-1 1v5H3V4h5c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1v11c0 .55.45 1 1 1h11c.55 0 1-.45 1-1V8c0-.55-.45-1-1-1z"
                                fill-rule="evenodd"></path>
                        </svg></span>
                    Text</button>
            </li>
            <li class="nav-item " role="presentation">
                <button class="nav-link m-0 py-4 px-0 w-100" id="Photos-tab" data-bs-toggle="tab" data-bs-target="#Photos"
                    type="button" role="tab" aria-controls="contact" aria-selected="false">
                    <span icon="media" aria-hidden="true" class="d-block"><svg data-icon="media" width="16" height="16"
                            viewBox="0 0 16 16">
                            <path
                                d="M11.99 6.99c.55 0 1-.45 1-1s-.45-1-1-1-1 .45-1 1 .45 1 1 1zm3-5h-14c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h14c.55 0 1-.45 1-1v-10c0-.55-.45-1-1-1zm-1 9l-5-3-1 2-3-4-3 5v-7h12v7z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </span>
                    Photos</button>
            </li>
            <li class="nav-item " role="presentation">
                <button class="nav-link m-0 py-4 px-0 w-100" id="Icons-tab" data-bs-toggle="tab" data-bs-target="#Icons"
                    type="button" role="tab" aria-controls="contact" aria-selected="false">
                    <span icon="icons" aria-hidden="true" class="d-block"><svg stroke="currentColor" fill="currentColor"
                            stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M512 128V32c0-17.67-14.33-32-32-32h-96c-17.67 0-32 14.33-32 32H160c0-17.67-14.33-32-32-32H32C14.33 0 0 14.33 0 32v96c0 17.67 14.33 32 32 32v192c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32h192c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32V160c17.67 0 32-14.33 32-32zm-96-64h32v32h-32V64zM64 64h32v32H64V64zm32 384H64v-32h32v32zm352 0h-32v-32h32v32zm-32-96h-32c-17.67 0-32 14.33-32 32v32H160v-32c0-17.67-14.33-32-32-32H96V160h32c17.67 0 32-14.33 32-32V96h192v32c0 17.67 14.33 32 32 32h32v192z">
                            </path>
                        </svg>
                    </span>
                    Icons</button>
            </li>
            <li class="nav-item " role="presentation">
                <button class="nav-link m-0 py-4 px-0 w-100" id="Elements-tab" data-bs-toggle="tab" data-bs-target="#Elements"
                    type="button" role="tab" aria-controls="contact" aria-selected="false">
                    <span icon="elements" aria-hidden="true" class="d-block"><svg stroke="currentColor"
                            fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M128,256A128,128,0,1,0,256,384,128,128,0,0,0,128,256Zm379-54.86L400.07,18.29a37.26,37.26,0,0,0-64.14,0L229,201.14C214.76,225.52,232.58,256,261.09,256H474.91C503.42,256,521.24,225.52,507,201.14ZM480,288H320a32,32,0,0,0-32,32V480a32,32,0,0,0,32,32H480a32,32,0,0,0,32-32V320A32,32,0,0,0,480,288Z">
                            </path>
                        </svg>
                    </span>
                    Elements</button>
            </li>
            <li class="nav-item remove-search-bar" role="presentation">
                <button class="nav-link m-0 py-4 px-0 w-100" id="Upload-tab" data-bs-toggle="tab" data-bs-target="#Upload"
                    type="button" role="tab" aria-controls="contact" aria-selected="false">
                    <span icon="cloud-upload" aria-hidden="true" class="d-block"><svg data-icon="cloud-upload"
                            width="16" height="16" viewBox="0 0 16 16">
                            <path
                                d="M8.71 7.29C8.53 7.11 8.28 7 8 7s-.53.11-.71.29l-3 3a1.003 1.003 0 001.42 1.42L7 10.41V15c0 .55.45 1 1 1s1-.45 1-1v-4.59l1.29 1.29c.18.19.43.3.71.3a1.003 1.003 0 00.71-1.71l-3-3zM12 4c-.03 0-.07 0-.1.01A5 5 0 002 5c0 .11.01.22.02.33a3.495 3.495 0 00.07 6.37c-.05-.23-.09-.46-.09-.7 0-.83.34-1.58.88-2.12l3-3a2.993 2.993 0 014.24 0l3 3c.54.54.88 1.29.88 2.12 0 .16-.02.32-.05.47C15.17 10.78 16 9.5 16 8c0-2.21-1.79-4-4-4z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </span>
                    Upload</button>
            </li>
            <li class="nav-item " role="presentation">
                <button class="nav-link m-0 py-4 px-0 w-100" id="Background-tab" data-bs-toggle="tab"
                    data-bs-target="#Background" type="button" role="tab" aria-controls="contact" aria-selected="false">
                    <span icon="background-icon" aria-hidden="true" class="d-block"><svg data-icon="layout-grid"
                            width="16" height="16" viewBox="0 0 16 16">
                            <path
                                d="M2 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6C.9 6 0 6.9 0 8s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-6C.9 0 0 .9 0 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 4c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM8 0C6.9 0 6 .9 6 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6 12c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM8 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </span>
                    &nbsp;&nbsp;Background&nbsp;&nbsp;</button>
            </li>
            <li class="nav-item remove-search-bar" role="presentation">
                <button class="nav-link m-0 py-4 px-0 w-100" id="Layers-tab" data-bs-toggle="tab" data-bs-target="#Layers"
                    type="button" role="tab" aria-controls="contact" aria-selected="false">
                    <span icon="layers-icon" aria-hidden="true" class="d-block"><svg data-icon="layers" width="16"
                            height="16" viewBox="0 0 16 16">
                            <path
                                d="M.55 4.89l7 3.5c.14.07.29.11.45.11s.31-.04.45-.11l7-3.5a.998.998 0 00-.06-1.81L8.4.08a1.006 1.006 0 00-.79 0l-6.99 3a.992.992 0 00-.07 1.81zM15 10c-.16 0-.31.04-.45.11L8 13.38 1.45 10.1c-.14-.06-.29-.1-.45-.1-.55 0-1 .45-1 1 0 .39.23.73.55.89l7 3.5c.14.07.29.11.45.11s.31-.04.45-.11l7-3.5c.32-.16.55-.5.55-.89 0-.55-.45-1-1-1zm0-3.5c-.16 0-.31.04-.45.11L8 9.88 1.45 6.61A.997.997 0 001 6.5c-.55 0-1 .45-1 1 0 .39.23.73.55.89l7 3.5c.14.07.29.11.45.11s.31-.04.45-.11l7-3.5c.32-.16.55-.5.55-.89 0-.55-.45-1-1-1z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </span>
                    Ressize</button>
            </li>
        </ul>
    </div>

    <div class='left-menu-container position-relative border-end'>
        <div class="tab-content position-absolute w-100 h-100 p-3" id="myTabContent">
            <div class="d-flex px-2 py-1 mb-4 template-display-searchbar rounded border">
                <span icon="search" aria-hidden="true" tabindex="-1"
                    class="me-2"><svg data-icon="search" width="16" height="16" viewBox="0 0 16 16">
                        <path
                            d="M15.55 13.43l-2.67-2.68a6.94 6.94 0 001.11-3.76c0-3.87-3.13-7-7-7s-7 3.13-7 7 3.13 7 7 7c1.39 0 2.68-.42 3.76-1.11l2.68 2.67a1.498 1.498 0 102.12-2.12zm-8.56-1.44c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"
                            fill-rule="evenodd"></path>
                    </svg> </span> 
                    <input type="text" placeholder="Search..." class="template-display-input w-100">
            </div>
            <div class="tab-pane fade show active template-display overflow-auto pe-3" id="Template" role="tabpanel"aria-labelledby="Template-tab">
                <?php include('components/templateComponent.php') ?>
            </div>
            <div class="tab-pane fade template-display overflow-auto pe-3" id="Text" role="tabpanel" aria-labelledby="Text-tab">
                <?php include('components/textComponent.php') ?>
            </div>
            <div class="tab-pane fade template-display overflow-auto pe-3" id="Photos" role="tabpanel" aria-labelledby="Photos-tab">
                <?php include('components/photosComponent.php') ?>
            </div>
            <div class="tab-pane fade template-display overflow-auto pe-3" id="Icons" role="tabpanel" aria-labelledby="Icons-tab">
                <?php include('components/iconsComponent.php') ?>
            </div>
            <div class="tab-pane fade template-display overflow-auto pe-3" id="Elements" role="tabpanel" aria-labelledby="Elements-tab">
                <?php include('components/elementsComponent.php') ?>
            </div>
            <div class="tab-pane fade template-display overflow-auto pe-3" id="Upload" role="tabpanel" aria-labelledby="Upload-tab">
                <?php include('components/uploadsComponent.php') ?>
            </div>
            <div class="tab-pane fade template-display overflow-auto pe-3" id="Background" role="tabpanel" aria-labelledby="Background-tab">
                <?php include('components/backgroundComponent.php') ?>
            </div>
            <div class="tab-pane fade template-display overflow-auto pe-3" id="Layers" role="tabpanel" aria-labelledby="Layers-tab">
                <?php include('components/resizeComponent.php') ?>
            </div>
        </div>
    </div>

    <div class='left-menu-close position-absolute'>
        <svg width="15" height="96" id='left-menu-close' fill='#067bc1' viewBox="0 0 15 96" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M3 0 C3.0011 4.42584 3.9102 9.9 7.2 13.28C7.45 13.4625 7.6 13.6 7.7 13.8048L7.8 13.8C9.8 15.8 11.6 17.6 12.9 19.7C14.0 21.6 14.7 23.9 14.9 27H15V68C15 71.7 14.3 74.3 13.0 76.6C11.7 78.8 9.9 80.5 7.8 82.6344L7.79 82.6C7.6 82.8 7.4507 83 7.27295 83.2127C3.9102 86.5228 3.0011 92.0739 3 95.4938">
            </path>
        </svg>
    </div>

</div>