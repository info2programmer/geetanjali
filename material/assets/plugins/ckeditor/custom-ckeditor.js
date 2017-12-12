
$(document).ready(function(){
initSample();
// There is no constructor for this class, the user just has to define an
// object with the appropriate properties.

// Example:
{
    type: 'checkbox',
    id: 'agree',
    label: 'I agree',
    'default': 'checked',
    onClick: function() {
        // this = CKEDITOR.ui.dialog.checkbox
        alert( 'Checked: ' + this.getValue() );
    }
}
});
