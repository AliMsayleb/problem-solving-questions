// Good morning! Here's your coding interview problem for today.

// This problem was asked by Twitter.

// Given a list of numbers, create an algorithm that arranges them in order to form the largest possible integer.
// For example, given [10, 7, 76, 415], you should return 77641510.

#include <vector>
#include <iostream>
#include <algorithm>

int main()
{
    std::vector<int> numbers({10, 7, 76, 415});

    sort(numbers.begin(), numbers.end(), [](const int& a, const int& b) -> bool
    { 
        std::string sa = std::to_string(a);
        std::string sb = std::to_string(b); 
        return std::stoi(sa+sb) > std::stoi(sb+sa);
    });
    
    for (auto x: numbers) {
        std::cout << x;
    }
}
