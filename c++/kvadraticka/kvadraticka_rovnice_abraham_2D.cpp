#include <iostream>
#include <cmath>

using namespace std;

int main (){
    float a, b, c, D, x1, x2;
    cout<<"zadejte cisla a, b, c pro vypocet kvadraticke rovnice. (a*x^2+b*x+c=0)"<<endl;
    cin >>a>>b>>c;

    if (a==0){
        cout<<"rovnice neni kvadraticka"<<endl;
        x1=(-c)/b;
        cout<<"x1 = "<<x1<<endl;
        return 0;
    }

    D=((b*b)-(4*(a*c)));
    cout<<"D = "<<D<<endl;
    
    if (D<0){
        cout<<"rovnice nema reseni v oboru realnych cisel";
        return 0;
    }

    D=sqrt(D);
    x1=((-b)+D)/(2*a);
    cout<<"x1 = "<<x1<<endl;

    if (D>0){
        x2=((-b)-D)/(2*a);
        cout<<"x2 = "<<x2;
    }
    return 0;
}