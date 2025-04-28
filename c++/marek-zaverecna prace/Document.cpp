#include <iostream>
#include <stdio.h>
#include <stdlib.h>
#include <time.h>


using namespace std;

int main()
{
    
    srand(time(NULL));
    //nastaveni pole pri spusteni
    int pocetMinOkolo[10][10];
    bool minaVpoli[10][10];
    bool poleZobrazeno[10][10];
    bool konec=0;
    int radek=0;
    int sloupec=0;
    char vlajkaNeboTah='t';
    

    for(int i=0;i<10;i++){
        for (int j=0;j<10;j++){
            pocetMinOkolo[i][j]=0;
            poleZobrazeno[i][j]=0;
            minaVpoli[i][j]=0;
        }
    }

    for(int i;i<10;i=i){
        int x = (rand()%9)+1;
        int y = (rand()%9)+1;
        if (minaVpoli[x][y]==0){
            minaVpoli[x][y]+=1;
            i=i+1;

            
            if(minaVpoli[x+1][y] !=1)   {pocetMinOkolo[x+1][y]+=1;}
            if(minaVpoli[x-1][y] !=1)   {pocetMinOkolo[x-1][y]+=1;}
            if(minaVpoli[x][y-1] !=1)   {pocetMinOkolo[x][y-1]+=1;}
            if(minaVpoli[x][y+1] !=1)   {pocetMinOkolo[x][y+1]+=1;}
            if(minaVpoli[x-1][y-1]!=1)  {pocetMinOkolo[x-1][y-1]+=1;}
            if(minaVpoli[x-1][y+1]!=1)  {pocetMinOkolo[x-1][y+1]+=1;}
            if(minaVpoli[x+1][y-1]!=1)  {pocetMinOkolo[x+1][y-1]+=1;}
            if(minaVpoli[x+1][y+1]!=1)  {pocetMinOkolo[x+1][y+1]+=1;}

            }
    }
    //nastaveni pole pri spusteni

    do{
            cout<<"prejete si odkryt pole(p) nebo oznacit bombu(f)?"<<endl;
            cin >> vlajkaNeboTah;
            cout<<"zadejte polohu(radek, sloupec)"<<endl;
            cin >> radek ;
            cin >> sloupec ;
            radek-=1;
            sloupec-=1;
            poleZobrazeno[radek][sloupec]=1;
            
            for(int i;i<100;i++){
                if (minaVpoli[radek+1][sloupec]==0){poleZobrazeno[radek+1][sloupec]=1;}
                if (minaVpoli[radek-1][sloupec]==0){poleZobrazeno[radek-1][sloupec]=1;}
                if (minaVpoli[radek][sloupec+1]==0){poleZobrazeno[radek][sloupec+1]=1;}
                if (minaVpoli[radek][sloupec-1]==0){poleZobrazeno[radek][sloupec-1]=1;}
                if (minaVpoli[radek+1][sloupec+1]==0){poleZobrazeno[radek+1][sloupec+1]=1;}
                if (minaVpoli[radek-1][sloupec-1]==0){poleZobrazeno[radek-1][sloupec-1]=1;}
                if (minaVpoli[radek+1][sloupec-1]==0){poleZobrazeno[radek+1][sloupec-1]=1;}
                if (minaVpoli[radek-1][sloupec+1]==0){poleZobrazeno[radek-1][sloupec+1]=1;}
                
                int random=(rand()%4);
                switch(random){
                case 0:     if ((minaVpoli[radek+1][sloupec]==0)&&(pocetMinOkolo[radek+1][sloupec]==0)){radek+=1;}
                    break;
                case 1:     if ((minaVpoli[radek][sloupec+1]==0)&&(pocetMinOkolo[radek][sloupec+1]==0)){sloupec+=1;}
                    break;
                case 2:     if ((minaVpoli[radek-1][sloupec]==0)&&(pocetMinOkolo[radek-1][sloupec]==0)){radek-=1;}
                    break;
                case 3:     if ((minaVpoli[radek][sloupec-1]==0)&&(pocetMinOkolo[radek][sloupec-1]==0)){sloupec+=1;}
                    break;
                }
            }
            
            if(vlajkaNeboTah=='p'){
                if (minaVpoli[radek][sloupec]==1){
                    konec=1;
                    cout<<endl<<endl<<"konec hry, mina odpalena"<<endl;
                }
            }
            else if(vlajkaNeboTah=='f'){
                
            }
        
        
        

        cout<<"1 2 3 4 5 6 7 8 9 10"<<endl<<endl;
        for(int i=0;i<10;i++){
            for (int j=0;j<10;j++){
                if (poleZobrazeno[i][j]==1){
                    if (minaVpoli[i][j]==0){
                        cout << pocetMinOkolo[i][j]<<" " ;}
                    else{cout<<"* ";}
                    }
                else{cout <<"- ";}
            }
            cout<<"  "<<i+1 << endl;
        }
    }
    while(konec==0);
}