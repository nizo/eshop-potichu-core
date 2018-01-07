@echo off

REM color 0a
title Eshop Potichu - Deployment Tool

:Menu
echo.
echo.
echo Select Task
echo ===========
echo.
echo 0. PHPloy status
echo 1. Git status
echo 2. Build new version
echo 3. Push new version to Git
echo 4. Deploy to server
echo 9. Exit

echo.

set /p a=
if "%a%"=="0" (
	echo.
	echo.
	echo PHPloy status
	echo =============
	GOTO PhployStatus
) 
if "%a%"=="1" (
	echo.
	echo.
	echo Git status
	echo ==========
	call git status
	GOTO Menu
) 

if "%a%"=="2" (
	GOTO BuildNewVersion
)

if "%a%"=="3" (	
	GOTO PushToGit
) 

if "%a%"=="4" (
	GOTO Deploy
)

if "%a%"=="9" (
	GOTO :EOF
) 

:BuildNewVersion
echo.
echo.
echo Build new version
echo =================
call gulp
GOTO Menu


:PushToGit

echo Are you sure?
echo =============
echo 0. No
echo 1. Yes
echo.

set /p c=
if "%c%"=="0" (
	echo.
	echo.
	echo Commit aborted!
	echo ===============
	set /p exit=
)
if "%c%"=="1" (
	set /p d="Enter commit description: "
	call git add -A
	call git commit -m "%d%" -a
	call git push
)
GOTO Menu



:PhployStatus
echo.
echo.
echo PHPloy status
echo =============
echo.
call phploy -l
GOTO Menu

:Deploy
echo.
echo.
echo Select deployment destination
echo =============================
echo 0. beta
echo 7. eshop.potichu.sk
echo 8. eshop.potichu.cz
echo.

set /p e=
if %e%==0 (
	echo Press enter to deploy files to potichu-beta
	set /p f=
	
	call phploy --server potichu-beta
)

if %e%==7 (	
	echo Press enter to deploy files to potichu-sk
	set /p f=
		
	call phploy --server potichu-sk
)

if %e%==8 (	
	echo Press enter to deploy files to potichu-cz
	set /p f=
		
	call phploy --server potichu-cz
)

echo.
echo.
echo All done
echo ========
echo.
echo.

