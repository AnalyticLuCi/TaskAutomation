Set objExcel = CreateObject("Excel.Application")
objExcel.DisplayAlerts = False

Set objWorkbook = objExcel.Workbooks.Open("FullFileName")
objExcel.Application.Run "'FullFilename'!FullMacroName"

WScript.Sleep 15000
objExcel.ActiveWorkbook.Save

WScript.Sleep 15000
objExcel.ActiveWorkbook.Close
objExcel.Application.Quit
Set objExcel = Nothing

Set WshShell = WScript.CreateObject("WScript.Shell")
WshShell.Run "C:\xampp\php\php-cgi.exe -f FullPHPMailerName", 0
