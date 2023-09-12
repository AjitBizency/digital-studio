import SidebarContainer from '../sidebarContainer/SidebarContainer';

import './SidebarPanel.css'

function SidebarPanel(){
    return(
        <div className='sidebarPanel'>
            <div className='sidebarTab'>
                <ul>
                    <li>Templates</li>
                    <li>Text</li>
                    <li>Photos</li>
                    <li>Icons</li>
                </ul>
            </div>

            <SidebarContainer></SidebarContainer>
        </div>
    );
}

export default SidebarPanel;