#include <iostream>
#include <windows.h>
using namespace std;

int main()
{
    int x;
    cin >>x;
    if (x<0){cout<<"zaporne cislo, vynasobeno cislem -1 na "<< x*-1<<endl;x=x*-1;}
    if (x>1){
    if (x%2 == 0){
            x=x+1;
            cout <<"sude cislo, zmeneno na "<< x<<endl;
                }
    for (int i=0;i<x;i++){cout <<" *";}

        for (int i=2;i<=x/2;i++){
                cout <<endl<<" *";
                for (int i=2;i<x;i++)
                if (i%x==x/2+1){cout<<" *";}
                else{cout<<"  ";}
                cout <<" *";}
                cout<<endl;

    for (int i=0;i<x;i++){cout <<" *";}

        for (int i=2;i<=x/2;i++){
                cout <<endl<<" *";
                for (int i=2;i<x;i++)
                if (i%x==x/2+1){cout<<" *";}
                else{cout<<"  ";}
                cout <<" *";}
                cout<<endl;

    for (int i=0;i<x;i++){cout <<" *";}}
else if(x=1){cout<<"lepe to s jednim znakem nedokazu:"<<endl<<"  +";}

ShellExecute(NULL, "open", "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
			NULL, NULL, SW_SHOWNORMAL);
}
