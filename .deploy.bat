@echo off

REM color 0a
title Eshop Potichu - Deployment Tool

:Menu
echo.
echo.
echo Eshop Core
echo ==========
echo.
echo 0. PHPloy status
echo 1. Build new version
echo 2. Deploy to server
echo 9. Exit

echo.

set /p a=
if "%a%"=="0" (
	GOTO PhployStatus
) 

if "%a%"=="1" (
	GOTO BuildNewVersion
)

if "%a%"=="2" (
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
echo.
call gulp
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
echo.
echo 0. beta
echo 1. eshop.potichu.sk
echo 2. eshop.potichu.cz
echo 9. All instances
echo.

set /p e=
if %e%==0 (
	echo Press enter to deploy files to potichu-beta
	set /p f=
	
	call phploy --server potichu-beta
)

if %e%==1 (	
	echo Press enter to deploy files to potichu-sk
	set /p f=
		
	call phploy --server potichu-sk
)

if %e%==2 (	
	echo Press enter to deploy files to potichu-cz
	set /p f=
		
	call phploy --server potichu-cz
)

if %e%==9 (	
	echo Press enter to deploy files to all instances
	set /p f=
		
	call phploy
)

echo.
echo.
echo Deployment successfull
echo ======================
echo.
echo.

