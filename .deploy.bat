@echo off

REM color 0a
title Eshop Potichu - Deployment Tool

echo.
echo.
echo Select Deployment Mode
echo ======================
echo 0. Deploy only
echo 1. Git status
echo 9. Build and deploy
echo.

set /p a=
if "%a%"=="0" (
	GOTO Deploy
)

if "%a%"=="1" (
	echo.
	echo.
	echo Git status
	echo ==========
	call git status
	set /p exit=
	GOTO :EOF
) 
if "%a%"=="9" (
	GOTO CheckIfDeployFeasible
) 


:CheckIfDeployFeasible
echo.
echo.
echo Check if deploy feasible
echo ========================
call git status

echo.
echo.
echo What to do?
echo ===========
echo 0. No need for rebuild/checkin/deploy
echo 9. Rebuild, checkin, deploy

set /p b=
if "%b%"=="0" (
	echo.
	echo Build/Deployment not started	
	set /p exit=
	GOTO :EOF
)
if "%b%"=="9" (
	GOTO PrepareDeploy
)


:PrepareDeploy
echo.
echo.
echo Build app
echo =========
call gulp
GOTO PushToGit

:PushToGit
echo.
echo.
echo Commit new version to git?
echo ==========================
echo 0. No
echo 9. Yes
echo.

set /p c=
if "%c%"=="0" (
	echo.
	echo.
	echo Commit aborted!
	echo ===============
	set /p exit=
	GOTO :EOF	
)
if "%c%"=="9" (
	set /p d="Enter commit description: "
	call git add -A
	call git commit -m "%d%" -a
	call git push
	GOTO Deploy
)


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
	echo.
	echo Checking status of potichu-beta
	echo ===============================
	echo.
	call phploy -l --server potichu-beta
		
	echo.
	echo.
	echo Press enter to deploy files to potichu-beta
	set /p f=
	
	call phploy --server potichu-beta
)

if %e%==7 (
	echo.
	echo Checking status of potichu-sk
	echo =============================
	echo.
	call phploy -l --server potichu-sk
	
	echo.
	echo.	
	echo Press enter to deploy files to potichu-sk
	set /p f=
		
	call phploy --server potichu-sk
)

if %e%==8 (
	echo.
	echo Checking status of potichu-cz
	echo ===============================
	echo.
	call phploy -l --server potichu-cz
	
	echo.
	echo.
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

