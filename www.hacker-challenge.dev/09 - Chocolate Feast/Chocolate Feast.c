//C++
#include <iostream>
using namespace std;
int main() {
	long int N_MoneyToStart, C_ChocCost, M_Wrappers_Reqd;
	int T_TestCases;
	cin >> T_TestCases;
	int *output;
	output = new int[T_TestCases];
	for(int i=0;i<T_TestCases;i++){
		cin >> N_MoneyToStart >> C_ChocCost >> M_Wrappers_Reqd;
		int Current_Chocos_On_Hand, New_Chocos, rem_Wrappers;
		int temp;
		Current_Chocos_On_Hand = N_MoneyToStart/C_ChocCost;
		if(M_Wrappers_Reqd > Current_Chocos_On_Hand)
			output[i] = Current_Chocos_On_Hand;
		else {
			New_Chocos = Current_Chocos_On_Hand / M_Wrappers_Reqd;
			rem_Wrappers = Current_Chocos_On_Hand % M_Wrappers_Reqd;
			Current_Chocos_On_Hand += New_Chocos;
			while((New_Chocos+rem_Wrappers) >= M_Wrappers_Reqd) {
				Current_Chocos_On_Hand += (New_Chocos + rem_Wrappers)/M_Wrappers_Reqd;
				temp = (New_Chocos+rem_Wrappers) % M_Wrappers_Reqd;
				New_Chocos = (New_Chocos+rem_Wrappers) / M_Wrappers_Reqd;
				rem_Wrappers = temp;
			}
			output[i] = Current_Chocos_On_Hand;
		}
	}
	for(int i=0;i<T_TestCases;i++) {
		cout << output[i] << endl;
	}
	return 0;
}