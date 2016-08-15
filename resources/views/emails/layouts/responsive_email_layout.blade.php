<style type="text/css">
    @media only screen and (max-width: 480px){
        #templateColumns{
            width:100% !important;
            font-family: 'Open Sans', 'Arial', sans-serif;
        }

        .templateColumnContainer{
            display:block !important;
            width:100% !important;
        }

        .columnImage{
            height:auto !important;
            max-width:480px !important;
            width:100% !important;
        }

        .leftColumnContent{
            font-size:16px !important;
            line-height:125% !important;
        }

        .rightColumnContent{
            font-size:16px !important;
            line-height:125% !important;
        }
    }
</style>

<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateColumns">
    <tr>
        <td align="center" valign="top" width="20%" class="templateColumnContainer"></td>
        <td align="center" valign="top" width="60%" class="templateColumnContainer">
            @yield('content')
        </td>
        <td align="center" valign="top" width="20%" class="templateColumnContainer"></td>
    </tr>
</table>