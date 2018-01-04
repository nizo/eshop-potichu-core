@echo off

REM color 0a
title Eshop Potichu - Deployment Tool

echo.
echo Select Deployment Destination
echo.
echo 0. beta
echo 7. eshop.potichu.sk
echo 8. eshop.potichu.cz
echo 9. all
echo.

set /p a=
if %a%==0 (
	gulp
	echo.
	phploy --server potichu-beta
)

if %a%==7 (
	gulp
	echo.
	phploy --server potichu-sk
)

if %a%==8 (
	gulp
	echo.
	phploy --server potichu-cz
)

if %a%==9 (
	gulp
	echo.
	phploy
)

pause