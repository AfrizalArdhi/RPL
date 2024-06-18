#include <iostream>
#include <chrono>
#include <vector>
void Merge(int arr[], int low, int mid, int high) {
int leftSize = mid - low + 1;
int rightSize = high - mid;
std::vector<int> leftArray(leftSize), rightArray(rightSize);
for (int i = 0; i < leftSize; i++) {
leftArray[i] = arr[low + i];
}
for (int j = 0; j < rightSize; j++) {
rightArray[j] = arr[mid + 1 + j];
}
int i = 0, j = 0, k = low;
while (i < leftSize && j < rightSize) {
if (leftArray[i] <= rightArray[j]) {
arr[k] = leftArray[i];
i++;
} else {
arr[k] = rightArray[j];
j++;
}
k++;
}
while (i < leftSize) {
arr[k] = leftArray[i];
i++;
k++;
}
while (j < rightSize) {
arr[k] = rightArray[j];
j++;
k++;
}
}
void MergeSort(int arr[], int low, int high) {
if (low < high) {
int mid = low + (high - low) / 2;
MergeSort(arr, low, mid);
MergeSort(arr, mid + 1, high);
Merge(arr, low, mid, high);
}
}
void printArray(int arr[], int size) {
for (int i = 0; i < size; i++) {
std::cout << arr[i] << " ";
}
std::cout << std::endl;
}
int main() {
int n;
std::cout << "Enter the number of elements: ";
std::cin >> n;
int* arr = new int[n];
srand(time(0));
for (int i = 0; i < n; i++) {
arr[i] = rand() % 1000;
}
std::cout << "Unsorted array: ";
printArray(arr, n);
auto start = std::chrono::high_resolution_clock::now();
MergeSort(arr, 0, n - 1);
auto end = std::chrono::high_resolution_clock::now();
std::cout << "Sorted array: ";
printArray(arr, n);
std::chrono::duration<double, std::milli> duration = end - start;
std::cout << "Time taken by MergeSort: " << duration.count() << " milliseconds" << std::endl;
delete[] arr;
return 0;
}