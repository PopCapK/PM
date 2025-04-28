#include <iostream>
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

using namespace std;


int main()
{
    int vyska;
    int delka;

    char botHrac;
    int vyhralHrac=0;

    bool platnyTah=0;
    bool hraProbiha=1;
    int hrac=1;
    int Pozice[3][3];
    char PoziceHodnota[3][3];

    for (int x=0;x<3;x++){
        for (int y=0;y<3;y++){
            Pozice[x][y]=0;
        }
    }
    cout<< "hra proti botovi(b) nebo hraci(h)"<<endl;
    cin >> botHrac;
    srand(time(0));
for(int kolo=1;hraProbiha==1;kolo++){

    //vypsani pole//
    for (int x=0;x<3;x++){
        for (int y=0;y<3;y++){
            if      (Pozice[x][y]==0){PoziceHodnota[x][y]=254;}
            else if (Pozice[x][y]==1){PoziceHodnota[x][y]=111;}
            else if (Pozice[x][y]==2){PoziceHodnota[x][y]=120;}
        }
    }
    cout << "1   2   3" <<endl<<endl;
    for (int x=0;x<3;x++){
        for (int y=0;y<3;y++){
            cout << PoziceHodnota[x][y];
            if (y<2){cout<<" | ";}
        }
        cout<<"  "<<x+1<<endl;
        if(x<2)cout<<"--+---+--"<<endl;
    }

cout<<"kolo:"<<kolo<<endl;

    //cin pozice//
    while (platnyTah==0){
        cout<<"hrac: "<<hrac<<", zadejte pozici (delka, vyska)"<<endl;
        cin >> vyska;
        cin >> delka;
        if (Pozice[delka-1][vyska-1]==0){
            platnyTah=1;
            Pozice[delka-1][vyska-1]=hrac;
        }
        else {platnyTah=0;}
    }


    //prohozeni hracu, tah bota//
    if(botHrac==104){
        if (hrac==1){hrac=2;}
        else if (hrac==2){hrac=1;}

    }
    else if (botHrac==98){

        bool botPlatnyTah=0;
        int randX;
        int randY;

         if ((Pozice[1][0]==1)&&(Pozice[2][0]==1)){Pozice[0][0]=2;}
    else if ((Pozice[0][1]==1)&&(Pozice[0][2]==1)){Pozice[0][0]=2;}

    else if ((Pozice[0][0]==1)&&(Pozice[0][2]==1)){Pozice[0][1]=2;}
    else if ((Pozice[1][1]==1)&&(Pozice[2][1]==1)){Pozice[0][1]=2;}

    else if ((Pozice[0][0]==1)&&(Pozice[0][1]==1)){Pozice[0][2]=2;}
    else if ((Pozice[2][2]==1)&&(Pozice[1][2]==1)){Pozice[0][2]=2;}


    else if ((Pozice[1][1]==1)&&(Pozice[1][2]==1)){Pozice[1][0]=2;}
    else if ((Pozice[0][0]==1)&&(Pozice[2][0]==1)){Pozice[1][0]=2;}

    else if ((Pozice[1][0]==1)&&(Pozice[1][2]==1)){Pozice[1][1]=2;}
    else if ((Pozice[0][1]==1)&&(Pozice[2][1]==1)){Pozice[1][1]=2;}

    else if ((Pozice[1][0]==1)&&(Pozice[1][1]==1)){Pozice[1][2]=2;}
    else if ((Pozice[0][2]==1)&&(Pozice[2][2]==1)){Pozice[1][2]=2;}


    else if ((Pozice[0][0]==1)&&(Pozice[0][2]==1)){Pozice[2][0]=2;}
    else if ((Pozice[2][2]==1)&&(Pozice[1][2]==1)){Pozice[2][0]=2;}

    else if ((Pozice[0][0]==1)&&(Pozice[0][2]==1)){Pozice[2][1]=2;}
    else if ((Pozice[2][2]==1)&&(Pozice[1][2]==1)){Pozice[2][1]=2;}

    else if ((Pozice[0][0]==1)&&(Pozice[0][2]==1)){Pozice[2][2]=2;}
    else if ((Pozice[2][2]==1)&&(Pozice[1][2]==1)){Pozice[2][2]=2;}
    platnyTah=0;
    /*
    while (platnyTah==0){
        randX=rand();
        randX=randX%3;
        randY=rand();
        randY=randY%3;

        if (Pozice[randX][randY]==0){
            platnyTah=1;
            Pozice[randX][randY]=2;
        }
        else {platnyTah=0;}

    }
    */
        //vypsani pole//

    for (int x=0;x<3;x++){
        for (int y=0;y<3;y++){
            if      (Pozice[x][y]==0){PoziceHodnota[x][y]=254;}
            else if (Pozice[x][y]==1){PoziceHodnota[x][y]=111;}
            else if (Pozice[x][y]==2){PoziceHodnota[x][y]=120;}
        }
    }

    cout << "1 2 3" <<endl<<endl;
    for (int x=0;x<3;x++){
        for (int y=0;y<3;y++){
            cout << PoziceHodnota[x][y]<<" ";
        }
        cout<<"  "<<x+1<<endl;
    }
    cout<<endl;
    }


    //check hra probiha//
    //vyhrava hrac 1?//
     if (Pozice[0][0] == 1 && Pozice[0][1] == 1 && Pozice[0][2] == 1){vyhralHrac=1;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[1][0] == 1 && Pozice[1][1] == 1 && Pozice[1][2] == 1){vyhralHrac=1;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[2][0] == 1 && Pozice[2][1] == 1 && Pozice[2][2] == 1){vyhralHrac=1;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[0][0] == 1 && Pozice[1][0] == 1 && Pozice[2][0] == 1){vyhralHrac=1;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[0][1] == 1 && Pozice[1][1] == 1 && Pozice[2][1] == 1){vyhralHrac=1;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[0][2] == 1 && Pozice[1][2] == 1 && Pozice[2][2] == 1){vyhralHrac=1;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[0][0] == 1 && Pozice[1][1] == 1 && Pozice[2][2] == 1){vyhralHrac=1;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[0][2] == 1 && Pozice[1][1] == 1 && Pozice[2][0] == 1){vyhralHrac=1;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}

     //vyhrava hrac 2?//
     if (Pozice[0][0] == 2 && Pozice[0][1] == 2 && Pozice[0][2] == 2){vyhralHrac=2;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[1][0] == 2 && Pozice[1][1] == 2 && Pozice[1][2] == 2){vyhralHrac=2;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[2][0] == 2 && Pozice[2][1] == 2 && Pozice[2][2] == 2){vyhralHrac=2;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[0][0] == 2 && Pozice[1][0] == 2 && Pozice[2][0] == 2){vyhralHrac=2;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[0][1] == 2 && Pozice[1][1] == 2 && Pozice[2][1] == 2){vyhralHrac=2;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[0][2] == 2 && Pozice[1][2] == 2 && Pozice[2][2] == 2){vyhralHrac=2;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[0][0] == 2 && Pozice[1][1] == 2 && Pozice[2][2] == 2){vyhralHrac=2;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}
     if (Pozice[0][2] == 2 && Pozice[1][1] == 2 && Pozice[2][0] == 2){vyhralHrac=2;hraProbiha=0;cout<<"konec hry, vyhrava hrac "<<vyhralHrac;}

     if (kolo==10){hraProbiha=0; cout<<"konec hry, remiza";}

     platnyTah=0;
}
}
