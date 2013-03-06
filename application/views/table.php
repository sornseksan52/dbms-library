<!DOCTYPE html>
<head>
    <link href='<?=base_url().'bootstrap/css/bootstrap.css'?>' type="text/css" rel = "stylesheet"></link> 
</head>
<body>
    <caption><h1 align = "center">All books are listed here</h1></caption>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Search?</th>
            <th>Field</th>
            <th colspan="2">Search criteria</th>
            <th>Include in report?<br></th>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="query_myTextEditBox">    
            </td>
            <td>
                myTextEditBox
            </td>
            <td>
                <select size ="1" name="myTextEditBox_compare_operator">
                    <option value="=">equals</option>
                    <option value="<>">does not equal</option>
                </select>
            </td>
            <td>
                <input type="text" name="myTextEditBox_compare_value">
            </td>
            <td>
                <input type="checkbox" name="report_myTextEditBox" value="checked">
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" name="query_myTextEditBox">    
            </td>
            <td>
                myTextEditBox
            </td>
            <td>
                <select size ="1" name="myTextEditBox_compare_operator">
                    <option value="=">equals</option>
                    <option value="<>">does not equal</option>
                </select>
            </td>
            <td>
                <input type="text" name="myTextEditBox_compare_value">
            </td>
            <td>
                <input type="checkbox" name="report_myTextEditBox" value="checked">
            </td>
        </tr>

    </table>
</body>
