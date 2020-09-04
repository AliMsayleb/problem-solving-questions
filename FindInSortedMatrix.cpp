// Hi, here's your problem today. This problem was recently asked by Facebook:
// Given a matrix that is organized such that the numbers will always be sorted left to right,
// and the first number of each row will always be greater than the last element of the last row (mat[i][0] > mat[i - 1][-1]),
// search for a specific value in the matrix and return whether it exists.
// Here's an example and some starter code.
// def searchMatrix(mat, value):
//   # Fill this in.
// mat = [
//     [1, 3, 5, 8],
//     [10, 11, 15, 16],
//     [24, 27, 30, 31],
// ]
// print(searchMatrix(mat, 4))
// # False
// print(searchMatrix(mat, 10))
// # True

#include <vector>
#include <string>
#include <iostream>

bool searchMatrix(std::vector<std::vector<int>> matrix, int value)
{
    auto lastRow = matrix.at(matrix.size() - 1);
    if (value < matrix.at(0).at(0) || value > lastRow.at(lastRow.size() - 1)) {
        return false;
    }
    
    // Finding Row first
    int start = 0, end = matrix.size() - 1;
    while (end - start > 1) {
        int current = (end + start) / 2;
        if (matrix.at(current).at(0) <= value) {
            start = current;
        } else {
            end = current;
        }
    }
    // here i know where this value might be at
    // i now look in this row
    int row;
    if (matrix.at(end).at(0) <= value) {
        row = end;
    } else {
        row = start;
    }
    start = 0, end = matrix.at(row).size() - 1;
    while (end - start > 1) {
        int current = (end + start) / 2;
        if (matrix.at(row).at(current) <= value) {
            start = current;
        } else {
            end = current;
        }
    }
    
    return matrix.at(row).at(start) == value || matrix.at(row).at(end) == value;
}

std::string getValue(bool val) {
    return val ? "Found" : "Not Found";
}

int main()
{
    std::vector<std::vector<int>> matrix;
    std::vector<int> temp;
    for (int i = 1; i <= 16; i++) {
        temp.push_back(i);
        if (i % 4 == 0) {
            matrix.push_back(temp);
            temp.clear();
        }
    }
    
    std::cout << "Searchign for 0: " << getValue(searchMatrix(matrix, 0)) << std::endl;
    std::cout << "Searchign for 1: " << getValue(searchMatrix(matrix, 1)) << std::endl;
    std::cout << "Searchign for 2: " << getValue(searchMatrix(matrix, 2)) << std::endl;
    std::cout << "Searchign for 3: " << getValue(searchMatrix(matrix, 3)) << std::endl;
    std::cout << "Searchign for 4: " << getValue(searchMatrix(matrix, 4)) << std::endl;
    std::cout << "Searchign for 5: " << getValue(searchMatrix(matrix, 5)) << std::endl;
    std::cout << "Searchign for 6: " << getValue(searchMatrix(matrix, 6)) << std::endl;
    std::cout << "Searchign for 7: " << getValue(searchMatrix(matrix, 7)) << std::endl;
    std::cout << "Searchign for 8: " << getValue(searchMatrix(matrix, 8)) << std::endl;
    std::cout << "Searchign for 9: " << getValue(searchMatrix(matrix, 9)) << std::endl;
    std::cout << "Searchign for 10: " << getValue(searchMatrix(matrix, 10)) << std::endl;
    std::cout << "Searchign for 11: " << getValue(searchMatrix(matrix, 11)) << std::endl;
    std::cout << "Searchign for 12: " << getValue(searchMatrix(matrix, 12)) << std::endl;
    std::cout << "Searchign for 13: " << getValue(searchMatrix(matrix, 13)) << std::endl;
    std::cout << "Searchign for 14: " << getValue(searchMatrix(matrix, 14)) << std::endl;
    std::cout << "Searchign for 15: " << getValue(searchMatrix(matrix, 15)) << std::endl;
    std::cout << "Searchign for 16: " << getValue(searchMatrix(matrix, 16)) << std::endl;
    std::cout << "Searchign for 17: " << getValue(searchMatrix(matrix, 17)) << std::endl;

    return 0;
}

