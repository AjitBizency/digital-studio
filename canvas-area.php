<?php
$url = basename($_SERVER['PHP_SELF']);
?>

<div class='canvas-area position-relative'>

    <div class='canvas-header d-flex align-items-center'>
        <div class='container-fluid'>
            <div class='d-flex justify-content-between align-items-center'>
                <div class="canvas-control d-flex">
                    <div class='d-flex'>
                        <button type="button" class="" id='undo'><span icon="undo" aria-hidden="true" class=""><svg
                                    data-icon="undo" width="16" height="16" viewBox="0 0 16 16">
                                    <path
                                        d="M4 11c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm7-7H3.41L4.7 2.71c.19-.18.3-.43.3-.71a1.003 1.003 0 00-1.71-.71l-3 3C.11 4.47 0 4.72 0 5c0 .28.11.53.29.71l3 3a1.003 1.003 0 001.42-1.42L3.41 6H11c1.66 0 3 1.34 3 3s-1.34 3-3 3H7v2h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"
                                        fill-rule="evenodd"></path>
                                </svg></span>
                        </button>
                        <button type="button" class="" id='redo'><span icon="redo" aria-hidden="true" class=""><svg
                                    data-icon="redo" width="16" height="16" viewBox="0 0 16 16">
                                    <path
                                        d="M12 11c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm3.71-6.71l-3-3a1.003 1.003 0 00-1.42 1.42L12.59 4H5C2.24 4 0 6.24 0 9s2.24 5 5 5h4v-2H5c-1.66 0-3-1.34-3-3s1.34-3 3-3h7.59L11.3 7.29c-.19.18-.3.43-.3.71a1.003 1.003 0 001.71.71l3-3c.18-.18.29-.43.29-.71 0-.28-.11-.53-.29-.71z"
                                        fill-rule="evenodd"></path>
                                </svg></span>
                        </button>
                    </div>

                    <div class='d-flex align-items-center'>
                        <span aria-haspopup="true" class="me-2" id="color-control">
                            <div class="d-flex" tabindex="0">
                                <input type="color" id="fill-color" class='colors' size="10" value=''>
                            </div>
                        </span>
                        <span class="d-flex">
                            <select id="font-family" class='text-white px-2 ms-2 rounded py-1' style='width: 200px'>
                                <!-- <option value="sans-serif" selected>Sans serif</option>
                                <option value="serif">Serif</option>
                                <option value="monospace">Monospace</option>
                                <option value="Poppins-Regular">Poppins</option> -->
                            </select>
                        </span>
                        <span class="d-flex">
                            <select id="text-align" class='text-white px-2 ms-2 rounded py-1'>
                                <option value="left" selected>Left</option>
                                <option value="center">Center</option>
                                <option value="right">Right</option>
                                <option value="justify">Justify</option>
                            </select>
                        </span>
                        <span class='text-font-size rounded ms-2'>
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <input type="text" id='text-font-size' autocomplete="off" min="5"
                                        class="text-white px-2" value="0" style="width: 40px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <button type="button" aria-label="increment" class="chevron">
                                        <span icon="chevron-up" aria-hidden="true" class=" d-flex">
                                            <svg data-icon="chevron-up" width="16" height="13" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.71 9.29l-4-4C8.53 5.11 8.28 5 8 5s-.53.11-.71.29l-4 4a1.003 1.003 0 001.42 1.42L8 7.41l3.29 3.29c.18.19.43.3.71.3a1.003 1.003 0 00.71-1.71z"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    <button type="button" aria-label="decrement" class="chevron">
                                        <span icon="chevron-down" aria-hidden="true" class=" d-flex">
                                            <svg data-icon="chevron-down" width="16" height="13" viewBox="0 0 16 16">
                                                <path
                                                    d="M12 5c-.28 0-.53.11-.71.29L8 8.59l-3.29-3.3a1.003 1.003 0 00-1.42 1.42l4 4c.18.18.43.29.71.29s.53-.11.71-.29l4-4A1.003 1.003 0 0012 5z"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </span>
                        <!-- <span>
                            <label for="text-line-height">Line Height</label>
                            <input type="range" min="0" class="input_slider" max="10" step="0.1" id="text-line-height">
                        </span> -->
                        <span class='ms-2'>
                            <!-- <input type='checkbox' name='fonttype' id="text-cmd-bold"> <b>B</b>
                            <input type='checkbox' name='fonttype' id="text-cmd-italic"> <i>I</i>
                            <input type='checkbox' name='fonttype' id="text-cmd-underline"> Underline
                            <input type='checkbox' name='fonttype' id="text-cmd-linethrough"> Linethrough
                            <input type='checkbox' name='fonttype' id="text-cmd-overline"> Overline -->

                            <div class="">
                                <span class='position-relative'>
                                    <button type="button" class="fonttype controller-btn">
                                        <span icon="bold" aria-hidden="true" class="textChar1">
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                version="1.1" id="mdi-format-line-spacing" viewBox="0 0 24 24"
                                                class="bp4-icon" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg" style="font-size: 20px;">
                                                <path
                                                    d="M10,13H22V11H10M10,19H22V17H10M10,7H22V5H10M6,7H8.5L5,3.5L1.5,7H4V17H1.5L5,20.5L8.5,17H6V7Z">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="position-absolute rounded controls-dropdown" style='display:none'>
                                        <div class="shadow d-flex flex-column py-2 px-3 m-0">
                                            <span>
                                                <label for="text-line-height">Line Height</label><br>
                                                <input type="range" class="input_slider" min="0" max="10" step="0.1"
                                                    id="text-line-height">
                                            </span>
                                            <hr class="m-1">
                                            <span>
                                                <label for="letter-spacing">Letter Spacing</label><br>
                                                <input type="range" class="input_slider" min="0" max="1000" step="10"
                                                    id="letter-spacing">
                                            </span>
                                        </div>
                                    </div>
                                </span>
                                <button type="button" class="fonttype">
                                    <span icon="bold" aria-hidden="true" class="bold">
                                        <svg data-icon="bold" width="16" height="16" viewBox="0 0 16 16">
                                            <path
                                                d="M11.7 7c.2-.4.3-1 .3-1.5v-.4V5c0-.1 0-.2-.1-.3v-.1C11.4 3.1 10.1 2 8.5 2H4c-.5 0-1 .4-1 1v10c0 .5.4 1 1 1h5c2.2 0 4-1.8 4-4 0-1.2-.5-2.3-1.3-3zM6 5h2c.6 0 1 .4 1 1s-.4 1-1 1H6V5zm3 6H6V9h3c.6 0 1 .4 1 1s-.4 1-1 1z"
                                                fill-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </button>
                                <button type="button" class="fonttype">
                                    <span icon="italic" aria-hidden="true" class="italic">
                                        <svg data-icon="italic" width="16" height="16" viewBox="0 0 16 16">
                                            <path
                                                d="M9.8 4H11c.5 0 1-.4 1-1s-.4-1-1-1H7c-.5 0-1 .4-1 1s.4 1 1 1h.8l-1.6 8H5c-.5 0-1 .4-1 1s.4 1 1 1h4c.5 0 1-.4 1-1s-.4-1-1-1h-.8l1.6-8z"
                                                fill-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </button>
                                <button type="button" class="fonttype">
                                    <span icon="underline" aria-hidden="true" class="underline">
                                        <svg data-icon="underline" width="16" height="16" viewBox="0 0 16 16">
                                            <path
                                                d="M8 14c2.8 0 5-2.2 5-5V3c0-.6-.4-1-1-1s-1 .4-1 1v6c0 1.7-1.3 3-3 3s-3-1.3-3-3V3c0-.6-.4-1-1-1s-1 .4-1 1v6c0 2.8 2.2 5 5 5zM13.5 15h-11c-.3 0-.5.2-.5.5s.2.5.5.5h11c.3 0 .5-.2.5-.5s-.2-.5-.5-.5z"
                                                fill-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </button>
                                <span class='position-relative'>
                                    <button type="button" class="controller-btn rounded py-1">
                                        <span icon="left-join" aria-hidden="true" tabindex="-1" class="">
                                            <svg data-icon="left-join" width="16" height="16" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.6 3.3C6.1 3.1 5.6 3 5 3 2.2 3 0 5.2 0 8s2.2 5 5 5c.6 0 1.1-.1 1.6-.3C5.3 11.6 4.5 9.9 4.5 8s.8-3.6 2.1-4.7zM8 4c-1.2.9-2 2.4-2 4s.8 3.1 2 4c1.2-.9 2-2.3 2-4s-.8-3.1-2-4zm3-1c2.8 0 5 2.2 5 5s-2.2 5-5 5c-.6 0-1.1-.1-1.6-.3 1.3-1.1 2.1-2.9 2.1-4.7s-.8-3.5-2.1-4.7c.5-.2 1-.3 1.6-.3zm.35 1.02c.73 1.15 1.14 2.52 1.14 3.98s-.42 2.83-1.14 3.98c2.04-.18 3.64-1.9 3.64-3.98s-1.6-3.8-3.64-3.98z"
                                                    fill-rule="evenodd">

                                                </path>
                                            </svg>
                                        </span>
                                        Effects
                                    </button>
                                    <div class='position-absolute rounded controls-dropdown' style='display: none; width: 200px'>
                                        <div class='shadow d-flex flex-column py-2 px-3 m-0'>
                                            <div class='mb-4'>
                                                <label class='d-flex align-items-center justify-content-between'>
                                                    <span>Stroke</span>
                                                    <input type="checkbox" class='checkbox' id="stroke">
                                                </label>
                                                <!-- <br> -->
                                                <label class='mt-2 w-100' style='display:none'>
                                                    <div class='d-flex align-items-center justify-content-between'>
                                                    <div class="d-flex" tabindex="0">
                                                        <input type="color" id="stroke-color" class='colors' size="10"
                                                            value=''>
                                                    </div>
                                                    <div class="d-flex align-items-center ms-4">
                                                        <div class="">
                                                            <input type="text" id='stroke' autocomplete="off" min="5"
                                                                class="px-2 border bg_dark border-0 text-white"
                                                                value="0" style="width: 40px;">
                                                        </div>
                                                        <div class="d-flex flex-column border">
                                                            <button type="button" aria-label="increment"
                                                                class="chevron">
                                                                <span icon="chevron-up" aria-hidden="true"
                                                                    class=" d-flex">
                                                                    <svg data-icon="chevron-up" width="16" height="13"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M12.71 9.29l-4-4C8.53 5.11 8.28 5 8 5s-.53.11-.71.29l-4 4a1.003 1.003 0 001.42 1.42L8 7.41l3.29 3.29c.18.19.43.3.71.3a1.003 1.003 0 00.71-1.71z"
                                                                            fill-rule="evenodd"></path>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                            <button type="button" aria-label="decrement"
                                                                class="chevron">
                                                                <span icon="chevron-down" aria-hidden="true"
                                                                    class=" d-flex">
                                                                    <svg data-icon="chevron-down" width="16" height="13"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M12 5c-.28 0-.53.11-.71.29L8 8.59l-3.29-3.3a1.003 1.003 0 00-1.42 1.42l4 4c.18.18.43.29.71.29s.53-.11.71-.29l4-4A1.003 1.003 0 0012 5z"
                                                                            fill-rule="evenodd"></path>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class='mb-4'>
                                                <label class='d-flex align-items-center justify-content-between'>
                                                    <span>Grayscale</span>
                                                    <input type="checkbox" class='checkbox' id="greyscale">
                                                </label>
                                            </div>
                                            <div class='mb-4'>
                                                <label class='d-flex align-items-center justify-content-between'>
                                                    <span>Blur</span>
                                                    <input type="checkbox" class='checkbox' id="image_blur">
                                                </label>
                                                <label class='mt-4 w-100' style='display:none'>
                                                    <input type="range" id="blur-value" class='input_slider' value="0.1" min="0" max="1" step="0.01">
                                                </label>
                                            </div>
                                                <div class='d-flex flex-column'>
                                                    <label class='d-flex align-items-center justify-content-between'>
                                                        <span>Shadow</span>
                                                        <input type="checkbox" class='checkbox' id="shadow">
                                                    </label>
                                                        <label class='mt-4' style='display:none'>
                                                            <div
                                                                class='d-flex align-items-center justify-content-between'>
                                                                <div>Blur</div>
                                                                <input type="text"
                                                                    class="bg_dark slider_input shadow-blur border-0 text-white text-center"
                                                                    style='width: 40px'>
                                                            </div>
                                                            <div class="d-flex" tabindex="0">
                                                                <input type="range" min="0" max="10"
                                                                    class='effects_input input_slider w-100 mt-2'
                                                                    step="0.1" id="shadow-blur">
                                                            </div>
                                                        </label>
                                                        <label class='mt-4' style='display:none'>
                                                            <div
                                                                class='d-flex align-items-center justify-content-between'>
                                                                <div>Offset X</div>
                                                                <input type="text"
                                                                    class="bg_dark offsetx slider_input border-0 text-white text-center"
                                                                    style='width: 40px'>
                                                            </div>
                                                            <div class="d-flex" tabindex="0">
                                                                <input type="range" min="-50" max="50"
                                                                    class='effects_input input_slider w-100 mt-2'
                                                                    step="1" id="offsetx" value='0'>
                                                            </div>
                                                        </label>
                                                    
                                                    <label class='mt-4' style='display:none'>
                                                            <div
                                                                class='d-flex align-items-center justify-content-between'>
                                                                <div>Offset Y</div>
                                                                <input type="text"
                                                                    class="bg_dark offsety slider_input border-0 text-white text-center"
                                                                    style='width: 40px'>
                                                            </div>
                                                            <div class="d-flex" tabindex="0">
                                                                <input type="range" min="-50" max="50"
                                                                    class='effects_input input_slider w-100 mt-2'
                                                                    step="1" id="offsety" value='0'>
                                                            </div>
                                                        </label>
                                                        <label class='mt-4' style='display:none'>
                                                            <div class='d-flex align-items-center justify-content-between'>
                                                                <span>Color</span>
                                                                <div class="d-flex" tabindex="0">
                                                                    <input type="color" id="shadow-color" class='colors'
                                                                        size="10" value=''>
                                                                </div>
                                                            </div>
                                                        </label>
                                                </div>
                                        </div>
                                    </div>
                                </span>
                                <span class='position-relative'>
                                    <button type="button" class="controller-btn rounded py-1">
                                        Flip
                                    </button>
                                    <div class='position-absolute rounded controls-dropdown' style='display: none'>
                                        <div class='shadow d-flex flex-column py-2 px-3 m-0'>
                                            <button class="flip p-2 rounded my-2" id='flip_horizontally'><span icon="" aria-hidden="true" tabindex="-1"
                                        class=""><svg data-icon="arrows-horizontal" width="16" height="16" viewBox="0 0 16 16" role="img"><path d="M15.7 7.3l-4-4c-.2-.2-.4-.3-.7-.3-.6 0-1 .5-1 1 0 .3.1.5.3.7L12.6 7H3.4l2.3-2.3c.2-.2.3-.4.3-.7 0-.5-.4-1-1-1-.3 0-.5.1-.7.3l-4 4c-.2.2-.3.4-.3.7s.1.5.3.7l4 4c.2.2.4.3.7.3.6 0 1-.4 1-1 0-.3-.1-.5-.3-.7L3.4 9h9.2l-2.3 2.3c-.2.2-.3.4-.3.7 0 .6.4 1 1 1 .3 0 .5-.1.7-.3l4-4c.2-.2.3-.4.3-.7s-.1-.5-.3-.7z" fill-rule="evenodd"></path></svg>
                                    </span> &nbsp;&nbsp;Flip horizontally</button>


                                    <button class="flip p-2 rounded mb-2" id='flip_vertically'><span icon="" aria-hidden="true" tabindex="-1"
                                        class=""><svg data-icon="arrows-vertical" width="16" height="16" viewBox="0 0 16 16" role="img"><path d="M12 10c-.3 0-.5.1-.7.3L9 12.6V3.4l2.3 2.3c.2.2.4.3.7.3.6 0 1-.4 1-1 0-.3-.1-.5-.3-.7l-4-4C8.5.1 8.3 0 8 0s-.5.1-.7.3l-4 4c-.2.2-.3.4-.3.7 0 .6.5 1 1 1 .3 0 .5-.1.7-.3L7 3.4v9.2l-2.3-2.3c-.2-.2-.4-.3-.7-.3-.5 0-1 .4-1 1 0 .3.1.5.3.7l4 4c.2.2.4.3.7.3s.5-.1.7-.3l4-4c.2-.2.3-.4.3-.7 0-.6-.4-1-1-1z" fill-rule="evenodd"></path></svg>
                                    </span> &nbsp;&nbsp;Flip vertically</button>

                                        </div>
                                    </div>
                                </span>
                                <button id=cropA>Crop Obejct</button>
                                <button id=cropB>Crop</button>
                                <button id=done>Done</button>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="">
                    <span aria-haspopup="true" class="position-relative">
                        <button type="button" class="rounded py-1 controller-btn" id=''>
                            <span icon="layers" aria-hidden="true" tabindex="-1" class="">
                                <svg data-icon="layers" width="16" height="16" viewBox="0 0 16 16">
                                    <path
                                        d="M.55 4.89l7 3.5c.14.07.29.11.45.11s.31-.04.45-.11l7-3.5a.998.998 0 00-.06-1.81L8.4.08a1.006 1.006 0 00-.79 0l-6.99 3a.992.992 0 00-.07 1.81zM15 10c-.16 0-.31.04-.45.11L8 13.38 1.45 10.1c-.14-.06-.29-.1-.45-.1-.55 0-1 .45-1 1 0 .39.23.73.55.89l7 3.5c.14.07.29.11.45.11s.31-.04.45-.11l7-3.5c.32-.16.55-.5.55-.89 0-.55-.45-1-1-1zm0-3.5c-.16 0-.31.04-.45.11L8 9.88 1.45 6.61A.997.997 0 001 6.5c-.55 0-1 .45-1 1 0 .39.23.73.55.89l7 3.5c.14.07.29.11.45.11s.31-.04.45-.11l7-3.5c.32-.16.55-.5.55-.89 0-.55-.45-1-1-1z"
                                        fill-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="">Position</span>
                        </button>
                        <div class='position-absolute rounded controls-dropdown' style='display: none'>
                            <div class='shadow d-flex flex-column py-2 px-3 m-0'>
                                <button class="alignment sendFront my-2"><span icon="" aria-hidden="true" tabindex="-1"
                                        class=""><svg data-icon="double-chevron-up" width="16" height="16"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M4 8c.28 0 .53-.11.71-.29L8 4.41l3.29 3.29c.18.19.43.3.71.3a1.003 1.003 0 00.71-1.71l-4-4C8.53 2.11 8.28 2 8 2s-.53.11-.71.29l-4 4A1.003 1.003 0 004 8zm4.71-.71C8.53 7.11 8.28 7 8 7s-.53.11-.71.29l-4 4a1.003 1.003 0 001.42 1.42L8 9.41l3.29 3.29c.18.19.43.3.71.3a1.003 1.003 0 00.71-1.71l-4-4z"
                                                fill-rule="evenodd"></path>
                                        </svg></span> Front</button>
                                <button class="alignment sendFoward my-2"><span icon="" aria-hidden="true" tabindex="-1"
                                        class=""><svg data-icon="chevron-up" width="16" height="16" viewBox="0 0 16 16">
                                            <path
                                                d="M12.71 9.29l-4-4C8.53 5.11 8.28 5 8 5s-.53.11-.71.29l-4 4a1.003 1.003 0 001.42 1.42L8 7.41l3.29 3.29c.18.19.43.3.71.3a1.003 1.003 0 00.71-1.71z"
                                                fill-rule="evenodd"></path>
                                        </svg></span> Up</button>
                                <button class="alignment sendBackward my-2"><span icon="" aria-hidden="true"
                                        tabindex="-1" class=""><svg data-icon="chevron-down" width="16" height="16"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M12 5c-.28 0-.53.11-.71.29L8 8.59l-3.29-3.3a1.003 1.003 0 00-1.42 1.42l4 4c.18.18.43.29.71.29s.53-.11.71-.29l4-4A1.003 1.003 0 0012 5z"
                                                fill-rule="evenodd"></path>
                                        </svg></span> Down</button>
                                <button class="alignment sendBack my-2"><span icon="" aria-hidden="true" tabindex="-1"
                                        class=""><svg data-icon="double-chevron-down" width="16" height="16"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M7.29 8.71c.18.18.43.29.71.29s.53-.11.71-.29l4-4a1.003 1.003 0 00-1.42-1.42L8 6.59l-3.29-3.3a1.003 1.003 0 00-1.42 1.42l4 4zM12 8c-.28 0-.53.11-.71.29L8 11.59l-3.29-3.3a1.003 1.003 0 00-1.42 1.42l4 4c.18.18.43.29.71.29s.53-.11.71-.29l4-4A1.003 1.003 0 0012 8z"
                                                fill-rule="evenodd"></path>
                                        </svg></span> Back</button>

                                <hr class='m-1'>
                                <button class="alignment my-2" data-action="left"><span icon="alignment-left"
                                        aria-hidden="true" tabindex="-1" class=""><svg data-icon="alignment-left"
                                            width="16" height="16" viewBox="0 0 16 16">
                                            <path
                                                d="M9 9H5c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h4c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1zM1 0C.45 0 0 .45 0 1v14c0 .55.45 1 1 1s1-.45 1-1V1c0-.55-.45-1-1-1zm13 2H5c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h9c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1z"
                                                fill-rule="evenodd"></path>
                                        </svg></span>Align Left</button>
                                <button class="alignment my-2" data-action="center"><span
                                        icon="alignment-vertical-center" aria-hidden="true" tabindex="-1"
                                        class="bp4-icon bp4-icon-alignment-vertical-center"><svg
                                            data-icon="alignment-vertical-center" width="16" height="16"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M13 2H9V1c0-.55-.45-1-1-1S7 .45 7 1v1H3c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h4v2H6c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h1v1c0 .55.45 1 1 1s1-.45 1-1v-1h1c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1H9V7h4c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1z"
                                                fill-rule="evenodd"></path>
                                        </svg></span> Align Center</button>
                                <button class="alignment my-2" data-action="middle"><span
                                        icon="alignment-horizontal-center" aria-hidden="true" tabindex="-1"
                                        class="bp4-icon bp4-icon-alignment-horizontal-center"><svg
                                            data-icon="alignment-horizontal-center" width="16" height="16"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M15 7h-1V6c0-.55-.45-1-1-1h-3c-.55 0-1 .45-1 1v1H7V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v4H1c-.55 0-1 .45-1 1s.45 1 1 1h1v4c0 .55.45 1 1 1h3c.55 0 1-.45 1-1V9h2v1c0 .55.45 1 1 1h3c.55 0 1-.45 1-1V9h1c.55 0 1-.45 1-1s-.45-1-1-1z"
                                                fill-rule="evenodd"></path>
                                        </svg></span> Align Middle</button>
                                <button class="alignment my-2" data-action="right"><span icon="alignment-right"
                                        aria-hidden="true" tabindex="-1" class="bp4-icon bp4-icon-alignment-right"><svg
                                            data-icon="alignment-right" width="16" height="16" viewBox="0 0 16 16">
                                            <path
                                                d="M11 9H7c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h4c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1zm4-9c-.55 0-1 .45-1 1v14c0 .55.45 1 1 1s1-.45 1-1V1c0-.55-.45-1-1-1zm-4 2H2c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h9c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1z"
                                                fill-rule="evenodd"></path>
                                        </svg></span> Align Right</button>
                                <button class="alignment my-2" data-action="top"><span icon="alignment-top"
                                        aria-hidden="true" tabindex="-1" class="bp4-icon bp4-icon-alignment-top"><svg
                                            data-icon="alignment-top" width="16" height="16" viewBox="0 0 16 16">
                                            <path
                                                d="M15 0H1C.45 0 0 .45 0 1s.45 1 1 1h14c.55 0 1-.45 1-1s-.45-1-1-1zM6 4H3c-.55 0-1 .45-1 1v9c0 .55.45 1 1 1h3c.55 0 1-.45 1-1V5c0-.55-.45-1-1-1zm7 0h-3c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1h3c.55 0 1-.45 1-1V5c0-.55-.45-1-1-1z"
                                                fill-rule="evenodd"></path>
                                        </svg></span> Align Top</button>
                                <button class="alignment my-2" data-action="bottom"><span icon="alignment-bottom"
                                        aria-hidden="true" tabindex="-1" class="bp4-icon bp4-icon-alignment-bottom"><svg
                                            data-icon="alignment-bottom" width="16" height="16" viewBox="0 0 16 16">
                                            <path
                                                d="M10 12h3c.55 0 1-.45 1-1V7c0-.55-.45-1-1-1h-3c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1zm5 2H1c-.55 0-1 .45-1 1s.45 1 1 1h14c.55 0 1-.45 1-1s-.45-1-1-1zM3 12h3c.55 0 1-.45 1-1V2c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v9c0 .55.45 1 1 1z"
                                                fill-rule="evenodd"></path>
                                        </svg></span> Align Bottom</button>
                            </div>
                        </div>
                    </span>
                    <span aria-haspopup="true" class="">
                        <span aria-haspopup="true" class="position-relative">
                            <button type="button" class="controller-btn">
                                <span class="">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                        class="" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                                        style="font-size: 20px;">
                                        <path
                                            d="M17.66 8L12 2.35 6.34 8C4.78 9.56 4 11.64 4 13.64s.78 4.11 2.34 5.67 3.61 2.35 5.66 2.35 4.1-.79 5.66-2.35S20 15.64 20 13.64 19.22 9.56 17.66 8zM6 14c.01-2 .62-3.27 1.76-4.4L12 5.27l4.24 4.38C17.38 10.77 17.99 12 18 14H6z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                            <div class='position-absolute shadow py-2 px-3 m-0 rounded controls-dropdown'
                                style='display: none'>
                                <label for='object_opacity' class='text-white'>Transparency</label><br>
                                <input type="range" class='input_slider' min="0" max="1" step="0.1"
                                    id="object_opacity">
                            </div>
                        </span>
                    </span>
                    <!-- <span aria-haspopup="true" class="">
                        <button type="button" class="lock">
                            <span icon="unlock" aria-hidden="true" class="">
                                <svg data-icon="unlock" width="16" height="16" viewBox="0 0 16 16">
                                    <path
                                        d="M11.99-.01c-2.21 0-4 1.79-4 4v3h-7c-.55 0-1 .45-1 1v7c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-7c0-.55-.45-1-1-1h-3v-3c0-1.1.9-2 2-2s2 .9 2 2v1c0 .55.45 1 1 1s1-.45 1-1v-1c0-2.21-1.79-4-4-4z"
                                        fill-rule="evenodd"></path>
                                </svg>
                            </span>
                        </button>
                    </span> -->
                    <span aria-haspopup="true" class="">
                        <button type="button" class="" id='cloneSelected'>
                            <span icon="duplicate" aria-hidden="true" class="">
                                <svg data-icon="duplicate" width="16" height="16" viewBox="0 0 16 16">
                                    <path
                                        d="M15 0H5c-.55 0-1 .45-1 1v2h2V2h8v7h-1v2h2c.55 0 1-.45 1-1V1c0-.55-.45-1-1-1zm-4 4H1c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h10c.55 0 1-.45 1-1V5c0-.55-.45-1-1-1zm-1 10H2V6h8v8z"
                                        fill-rule="evenodd"></path>
                                </svg>
                            </span>
                        </button>
                    </span>
                    <span aria-haspopup="true" class="bp4-popover2-target">
                        <button type="button" class="" id='delete'>
                            <span icon="trash" aria-hidden="true" class="">
                                <svg data-icon="trash" width="16" height="16" viewBox="0 0 16 16">
                                    <path
                                        d="M14.49 3.99h-13c-.28 0-.5.22-.5.5s.22.5.5.5h.5v10c0 .55.45 1 1 1h10c.55 0 1-.45 1-1v-10h.5c.28 0 .5-.22.5-.5s-.22-.5-.5-.5zm-8.5 9c0 .55-.45 1-1 1s-1-.45-1-1v-6c0-.55.45-1 1-1s1 .45 1 1v6zm3 0c0 .55-.45 1-1 1s-1-.45-1-1v-6c0-.55.45-1 1-1s1 .45 1 1v6zm3 0c0 .55-.45 1-1 1s-1-.45-1-1v-6c0-.55.45-1 1-1s1 .45 1 1v6zm2-12h-4c0-.55-.45-1-1-1h-2c-.55 0-1 .45-1 1h-4c-.55 0-1 .45-1 1v1h14v-1c0-.55-.45-1-1-1z"
                                        fill-rule="evenodd">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    </span>
                    <span class='ms-3'>
                        <button class='border rounded py-1 px-3' id="b" style='background: #0065a1'>Save</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="drawing-area d-flex justify-content-center position-relative align-items-center">
        <div id='stage'>
            <div class="canvas-wrapper">
                <canvas id="canvas-element-0" class='canvas border'></canvas>
            </div>
            <button class="add-canvas bg_dark rounded mt-3 p-2 position-absolute"> + Add Canvas</button>
        </div>
    </div>
</div>