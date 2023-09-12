
import SidebarContainer from '../sidebarContainer/SidebarContainer';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';


import './SidebarPanel.css'

function SidebarPanel(){
    return(
        <div className='sidebarPanel'>
            <div className='sidebarTab'>
                <ul>
                    <li>
                        <FontAwesomeIcon icon={['fab', 'apple']} />
                        
                        Templates</li>
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