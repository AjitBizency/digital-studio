<?php
$url = basename($_SERVER['PHP_SELF']);
?>

<header class='py-3 border-bottom'>
    <div class='container-fluid'>
        <nav class='d-flex justify-content-between align-items-center'>
            <div class='left-side'>
                <button>
                    <span>
                        <svg data-icon="new-object" width="16" height="16" viewBox="0 0 16 16" class='header-icons'><path d="M8 4c0 .6.4 1 1 1h2v2c0 .6.4 1 1 1s1-.4 1-1V5h2c.6 0 1-.4 1-1s-.4-1-1-1h-2V1c0-.6-.4-1-1-1s-1 .4-1 1v2H9c-.6 0-1 .5-1 1zm6.5 2.5V7c0 1.4-1.1 2.5-2.5 2.5S9.5 8.4 9.5 7v-.5H9C7.6 6.5 6.5 5.4 6.5 4S7.6 1.5 9 1.5h.5V1c0-.3.1-.6.1-.8C9.1.1 8.6 0 8 0 3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8c0-.6-.1-1.3-.2-1.9-.4.3-.8.4-1.3.4z" fill-rule="evenodd"></path>
                        </svg>
                    </span>
                    New
                </button>&nbsp;&nbsp;
                <label for="load-project">
                    <button>
                        <span icon="folder-open" aria-hidden="true" tabindex="-1">
                            <svg data-icon="folder-open" width="16" height="16" viewBox="0 0 16 16"  class="header-icons"><path d="M2.06 6.69c.14-.4.5-.69.94-.69h11V5c0-.55-.45-1-1-1H6.41l-1.7-1.71A.997.997 0 004 2H1c-.55 0-1 .45-1 1v9.84l2.05-6.15h.01zM16 8c0-.55-.45-1-1-1H4a.99.99 0 00-.94.69l-2 6c-.04.09-.06.2-.06.31 0 .55.45 1 1 1h11c.44 0 .81-.29.94-.69l2-6c.04-.09.06-.2.06-.31z" fill-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="bp4-button-text">Open</span>
                    </button>
                    <input type="file" id="load-project" accept=".json,.polotno" style="width: 180px; display: none;">
                </label>&nbsp;&nbsp;
                <button>
                    <span>
                        <svg data-icon="floppy-disk" width="16" height="16" viewBox="0 0 16 16" class='header-icons'><path d="M15.71 2.29l-2-2A.997.997 0 0013 0h-1v6H4V0H1C.45 0 0 .45 0 1v14c0 .55.45 1 1 1h14c.55 0 1-.45 1-1V3c0-.28-.11-.53-.29-.71zM14 15H2V9c0-.55.45-1 1-1h10c.55 0 1 .45 1 1v6zM11 1H9v4h2V1z" fill-rule="evenodd"></path>
                        </svg>
                    </span>
                    Save
                </button>
            </div>

            <div class='right-side'>
                
            </div>
        </nav>
    </div>
</header>