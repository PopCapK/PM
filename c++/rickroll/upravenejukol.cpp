#include <iostream>
#include <windows.h>
#include <shellapi.h>
using namespace std;

int main()
{
ShellExecute(NULL, "open", "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
			NULL, NULL, SW_SHOWNORMAL);
}
