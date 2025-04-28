#include <iostream>
#include <stdio.h>
#include <stdlib.h>
#include<time.h>

using namespace std;

//vynechány: alpha, amalgam, amoeba, ant queen, worker ant, beehive, bloodhound, bulfrog,
    string karty [3] [20]={{"                   ","       Adder      ","        Bat        ","        Bee        ","       Beaver       ","Caged Wolf","Cat","Great White","stinkbug","mantis","mantis god"},
                           {" ",                            "Adder",                  "Bat",                  "Bee",                  "Beaver",},
                           {" ",                          "ToD", "airb","dams", "airb",    "",     "ml",    "",          "",         "",      "",}};


    int hodnoty [4][10]=   {{0,                                 1,                      2,                   3,                      4,},
    /*health*/              {0,                                 1,                      1,                   1,                      1,},
    /*damage*/              {0,                                 1,                      2,                   1,},
    /*blood cost*/          {0,                                 2,                                           0,}};



    string inkarty [4];
    int inhodnoty[4][4];



    int obeti[4];
    int enemyCards[4];
    int nahodnaKarta=0;
    char vyberObeti;
    int balicek;
    int misto;
    bool pokladaniKaret=false;
    char anone;
    int inHand[10];
    int vybranaKarta;
    int notDrawn [20];
    int deck[20];

void herniPole();
int main()
{

    srand (time(0));

    for(int vsechnyctyri=0;vsechnyctyri<5;vsechnyctyri++){
        inkarty [vsechnyctyri]="                   ";
    }
    cout<<"Another challenger, it has been ages."<<endl;
    cout<<"pick your deck"<<endl;
    cout<< "1) "<<endl
        << "2) "<<endl
        << "3) "<<endl;
    cin>>balicek;
    switch (balicek){
        case 1:
            deck[0]=hodnoty[0][1];
            deck[1]=hodnoty[0][2];
            deck[2]=hodnoty[0][3];
            deck[3]=hodnoty[0][4];
            notDrawn [0]=hodnoty[0][1];
            notDrawn [1]=hodnoty[0][2];
            notDrawn [2]=hodnoty[0][3];
            notDrawn [3]=hodnoty[0][4];
            break;

            /*
        case 2:
            notDrawn [1] ;
            notDrawn [2] ;
            notDrawn [3] ;
            notDrawn [4] ;
            break;
        case 3:
            notDrawn [1] ;
            notDrawn [2] ;
            notDrawn [3] ;
            notDrawn [4] ;
            break;
            */
        }//switch
    system("cls");



    for(int neprepisKartu=0; neprepisKartu <3;){
        if(notDrawn [nahodnaKarta]== 0){
            nahodnaKarta= rand() % 19;
        }//if aby ta karta byla rand, co není vzduch
        else{
        inHand[neprepisKartu]= notDrawn[nahodnaKarta];
        notDrawn [nahodnaKarta] = 0;
        neprepisKartu++;
        }//else
    }//for vyber místo kde actually je nějaká karta
    herniPole();



    cout<<"time to place cards..."<<endl<<"or do you pass?(y/n) ";
    cin>>anone;
    if (anone=='n'){
        while(pokladaniKaret=true){
            cout<<"what card?(cislo)"<<endl;
            cin>>vybranaKarta;
            if(inHand[vybranaKarta]!=0){
                for(int krev;krev<inhodnoty[3][vybranaKarta];){
                    cout<<"Who will you sacrifice?(1-4 or n to cancel)"<<endl;
                    cin>>vyberObeti;
                    if(vyberObeti=='n'){
                        break;
                    }//if
                    if (inhodnoty[0][vyberObeti]=!0){
                        krev++;
                    }//if je na vybranem poli karta?
                    else{
                        cout<<"there is nothing to sacrifice in that place"<<endl;
                    }//else
                    if(krev==inhodnoty[3][inHand[vybranaKarta]]){
                        cout<<"where?(1-4)"<<endl; //Je tam doslova instrukce od kolika do kolik, jestli by tam někdo dal něco jiného tak to není můj problém :)
                        cin>>misto;
                        for(int predathodnoty;predathodnoty<4;predathodnoty++){
                            inhodnoty[predathodnoty][misto]=hodnoty[predathodnoty][inHand[vybranaKarta]];
                        }//for
                        inkarty[misto] = karty[0][inHand[vybranaKarta]];
                        inHand[vybranaKarta]=0;
                        system("cls");
                        cout<<"another one?";
                        cin>>anone;
                        if(anone=='n'){
                        pokladaniKaret=false;
                        }//if
                    }
                }//for aby obětoval kolik musí
            }//if jestli to není veverka or smth
        }//while
    }

}//main
void herniPole(){
    cout<<"  ___________________        __________________       ___________________       ___________________"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |___________________|      |__________________|     |___________________|     |___________________|"<<endl<<endl<<endl;

                //0                             1                        2                        3

    cout<<"  ___________________        __________________       ___________________       ___________________"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |"<<inkarty[1]<<   "|      |"<<inkarty[2]<<  "|     |"<<  inkarty[3]<< "|     |"   <<inkarty[4]<<"|"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |                   |      |                  |     |                   |     |                   |"<<endl
        <<" |___________________|      |__________________|     |___________________|     |___________________|"<<endl<<endl<<endl;

        for(int maxDeset=0; maxDeset<10; maxDeset++){
            cout<<maxDeset<<karty[1][inHand[maxDeset]]<<endl;

        }
        cout<<inHand[9];
        cout<<karty[1][inHand[3]]<<endl<<inHand[3];
}//herniPole






