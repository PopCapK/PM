#include <iostream>

using namespace std;

int main()
{
    int a, b, c;
    cin >> a;
    cin >> b;
    cin >> c;
     if ((a>b)||(a==b)){
        if ((a>c)||(a==c)){
            cout << "a=" <<a<<", "; 
            if (b<c){cout<<"c="<<c<<", b="<<b;}
            else {cout<<"b="<<b<<", c="<<c;}
        }
         else {
            cout<<"c="<<c<<", ";
            if (a<b){cout<<"b="<<b<<", a="<<a;}
            else{cout<<"a="<<a<<", b="<<b;}
            }
     }
     else{
         if((b>c)||(b==c)){
            cout << "b=" <<b<<", "; 
            if (a<c){cout<<"c="<<c<<", a="<<a;}
            else {cout<<"a="<<a<<", c="<<c;}
            }
          else {
          cout<<"c="<<c<<", ";
          if (a<b){cout<<"b="<<b<<", a="<<a;}
          else{cout<<"a="<<a<<", b="<<b;}
          }
        }
   //aby terminal zustal otevreny bez pouziti dalsich knihoven// 
   cin >>a;
}