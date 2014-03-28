<!-- Include one of jTable styles. -->
<link href="/jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />
 
<!-- Include jTable script file. -->
<script src="/jtable/jquery.jtable.min.js" type="text/javascript"></script>

<div id="PersonTableContainer">  
<script type="text/javascript">
    $(document).ready(function () {
        $('#Spielerinformation').jtable({
            title: 'Table of people',
            actions: {
                listAction: '/GettingStarted/PersonList',
                createAction: '/GettingStarted/CreatePerson',
                updateAction: '/GettingStarted/UpdatePerson',
                deleteAction: '/GettingStarted/DeletePerson'
            },
            fields: {
                PersonId: {
                    key: true,
                    list: false
                },
                Name: {
                    title: 'Author Name',
                    width: '40%'
                },
                Age: {
                    title: 'Age',
                    width: '20%'
                },
                RecordDate: {
                    title: 'Record date',
                    width: '30%',
                    type: 'date',
                    create: false,
                    edit: false
                }
            }
        });
    });
</script>



</div>