#include <iostream>
#include <windows.h>
#include <conio.h>
using namespace std;

int main()
{
    cout << "stastny novy rok" << endl;
    cout << "   * * *                       * * *         * * *  "<<endl;
    cout << " *       *                   *       *     *       *"<<endl;
    cout << "         *       * * *               *             *"<<endl;
    cout << "       *       *       *           *             *  "<<endl;
    cout << "       *       *       *           *             *  "<<endl;
    cout << "     *         *       *         *             *    "<<endl;
    cout << "   *           *       *       *             *      "<<endl;
    cout << "   *           *       *       *             *      "<<endl;
    cout << " * * * * *       * * *       * * * * *     * * * * *"<<endl;
    ShellExecute(NULL, "open", "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
			NULL, NULL, SW_SHOWNORMAL);
    int x;
    cin >> x;
    getch();
}
