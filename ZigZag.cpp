// Good morning! Here's your coding interview problem for today.
// This problem was asked by PayPal.
// Given a string and a number of lines k, print the string in zigzag form. 
// In zigzag, characters are printed out diagonally from top left to bottom right until reaching the kth line, 
// then back up to top right, and so on.
// For example, given the sentence "thisisazigzag" and k = 4, you should print:
// t     a     g
//  h   s z   a
//   i i   i z
//    s     g

#include <string>
#include <iostream>

void zigzag(std::string str, int k)
{
    for (int lines = 0; lines < k; ++lines) {
        for (int currentChar = 0; currentChar < str.size(); ++currentChar) {
            int temp = currentChar % (2 * (k - 1));
            if (temp == lines || (temp + lines) % (2 * (k - 1)) == 0) {
                std::cout << str.at(currentChar);
            } else {
                std::cout << " ";
            }
        }
        std::cout << std::endl;
    }
}

int main() 
{
    zigzag("thisisazigzag", 4);
}
