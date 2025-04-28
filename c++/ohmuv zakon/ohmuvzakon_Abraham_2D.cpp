#include <iostream>

using namespace std;

int main()
{
    bool znamePromenne[4]={0, 0, 0, 0};
    char znamePromenneChar[2];
    float u;
    float R;
    float I;
    float P;

    cout<<"ELEKROTECHNICKE VYPOCTY"<<endl<<"zadejte 2 zname promenne (u/R/I/P)"<<endl;
    cin >>znamePromenneChar[0]>>znamePromenneChar[1];
    for (int i=0;i<2;i++)
        if      (znamePromenneChar[i]=='u'){znamePromenne[0]=1;}
        else if (znamePromenneChar[i]=='R'){znamePromenne[1]=1;}
        else if (znamePromenneChar[i]=='I'){znamePromenne[2]=1;}
        else if (znamePromenneChar[i]=='P'){znamePromenne[3]=1;}

    cout<<"zadejte hodnoty promennych v poradi ";

    if      ((znamePromenne[0]==0)&&(znamePromenne[1]==0)&&(znamePromenne[2]==1)&&(znamePromenne[3]==1)){
        cout<<"I, P"<<endl;
        cin >> I >> P;
        u=(1/I)*P;
        R=(1/I)*u;
       
    }

    else if ((znamePromenne[0]==0)&&(znamePromenne[1]==1)&&(znamePromenne[2]==0)&&(znamePromenne[3]==1)){
        cout<<"R, P"<<endl;
        cin>>R>>P;
        I=(1/R)*(R*I);
        u=R*I;

    }

    else if ((znamePromenne[0]==1)&&(znamePromenne[1]==0)&&(znamePromenne[2]==0)&&(znamePromenne[3]==1)){
        cout<<"u, P"<<endl;
        cin>>u>>P;
        R=u/((1/R)*u);
        I=(1/R)*u;
        
    }

    else if ((znamePromenne[0]==0)&&(znamePromenne[1]==1)&&(znamePromenne[2]==1)&&(znamePromenne[3]==0)){
        cout<<"R, I"<<endl;
        cin>>R>>I;
        u=R*I;
        P=u*I;
        
    }

    else if ((znamePromenne[0]==1)&&(znamePromenne[1]==1)&&(znamePromenne[2]==0)&&(znamePromenne[3]==0)){
        cout<<"u, R"<<endl;
        cin>>u>>R;
        I=(1/R)*u;
        P=u*I;

    }

    else if ((znamePromenne[0]==1)&&(znamePromenne[1]==0)&&(znamePromenne[2]==1)&&(znamePromenne[3]==0)){
        cout<<"u, I"<<endl;
        cin>>u>>I;
        P=u*I;
        R=u/I;

    }
    cout <<"u="<< u <<"v, R="<< R<<"Ω, I="<<I<<"A, P="<<P<<"W";
    return 0;
}
