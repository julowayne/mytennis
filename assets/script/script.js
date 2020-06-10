var tab_anc = 'inscription'; 
change_tab(tab_anc);
function change_tab(name){
    document.getElementById(`tab-${tab_anc}`).className = 'tab';
    document.getElementById(`tab-${name}`).className = 'tab';
    document.getElementById(`tab-content-${tab_anc}`).style.display = 'none';
    document.getElementById(`tab-content-${name}`).style.display = 'block';
    tab_anc = name;
}
/* function chgAction( action_name )
{
    if( action_name=="signup" ) {
        document.search-theme-form.action == "/SIGNUP";
    }
    else if( action_name=="login" ) {
        document.search-theme-form.action == "/LOGIN";
    }
} */