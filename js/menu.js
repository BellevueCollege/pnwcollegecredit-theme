/**
 * File menu.js.
 *
 * Handles toggling the navigation submenus for small screens
 */

window.addEventListener('DOMContentLoaded', () => {
    
    //Get all parent menus with children
    const parentHTMLCollection = document.getElementsByClassName('menu-item menu-item-has-children');
    const parentArray = Array.from(parentHTMLCollection);

    //Make all sub-menus display none until parent is clicked
    parentArray.forEach(parent => {
        const subMenu = parent.getElementsByClassName('sub-menu')[0];
        subMenu.classList.add('is-hidden'); //hidden on mobile only
    });

    //On click of a parent menu arrow, display the sub-menu
    for (let i = 0; i < parentHTMLCollection.length; i++) {
        const childSubMenu = parentHTMLCollection[i].getElementsByClassName('sub-menu')[0];
        childSubMenu.setAttribute('aria-expanded', 'false');

        //Create the new node to show dropdown arrow
        const dropdownArrow = document.createElement("span");
        dropdownArrow.innerHTML += ">";
        dropdownArrow.classList.add('menu-arrow');
        
        //Insert the dropdown arrow after list link
        const parent_link = parentHTMLCollection[i].firstChild;
        parent_link.after(dropdownArrow);

        //On click of the drop down arrow, expand the sub-menu
        //and set the aria-expanded attribute
        dropdownArrow.addEventListener('click', function(e) {
            if (childSubMenu.getAttribute('aria-expanded') == 'false') {
                childSubMenu.setAttribute('aria-expanded', 'true');
            } else {
                childSubMenu.setAttribute('aria-expanded', 'false');
            }

            dropdownArrow.classList.toggle('menu-arrow-rotate');
            childSubMenu.classList.toggle('is-hidden'); //toggles is-hidden class to display the sub-menu
        });
    }  
});