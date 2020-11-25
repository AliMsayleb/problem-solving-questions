// Good morning! Here's your coding interview problem for today.
// This problem was asked by Oracle.
// You are presented with an 8 by 8 matrix representing the positions of pieces on a chess board. 
// The only pieces on the board are the black king and various white pieces. Given this matrix, determine whether the king is in check.
// For example, given the following matrix:
// ...K....
// ........
// .B......
// ......P.
// .......R
// ..N.....
// ........
// .....Q..
// You should return True, since the bishop is attacking the king diagonally.

// This could be solved in a cleaner way, refactoring some methods to traverse the board in a more understandable means
// But this should be clear enough for any chess player
// And this has a straighforward clean complexity, no complications or unecessary checks

#include <iostream>

bool isKingInCheck(char (&board)[8][8], int xK, int yK)
{
    // upwards:
    for (int i = xK - 1; i >= 0; i--) {
        if (board[i][yK] == 'Q' || board[i][yK] == 'R') {
            return true;
        } else if (board[i][yK] != '.') {
            break;
        }
    }
    // downwards:
    for (int i = xK + 1; i < 8; i++) {
        if (board[i][yK] == 'Q' || board[i][yK] == 'R') {
            return true;
        } else if (board[i][yK] != '.') {
            break;
        }
    }
    // left:
    for (int j = yK - 1; j >= 0; j--) {
        if (board[xK][j] == 'Q' || board[xK][j] == 'R') {
            return true;
        } else if (board[xK][j] != '.') {
            break;
        }
    }
    // right:
    for (int j = yK + 1; j < 8; j++) {
        if (board[xK][j] == 'Q' || board[xK][j] == 'R') {
            return true;
        } else if (board[xK][j] != '.') {
            break;
        }
    }
    //down right diagonal
    for (int i = xK + 1, j = yK + 1; i < 8 && j < 8; i++, j++) {
        if (board[i][j] == 'Q' || board[i][j] == 'B') {
            return true;
        } else if (board[i][j] != '.') {
            break;
        }
    }
    //down left diagonal
    for (int i = xK + 1, j = yK - 1; i < 8 && j >= 0; i++, j--) {
        if (board[i][j] == 'Q' || board[i][j] == 'B') {
            return true;
        } else if (board[i][j] != '.') {
            break;
        }
    }
    //up right diagonal
    for (int i = xK - 1, j = yK + 1; i >= 0 && j < 8; i--, j++) {
        if (board[i][j] == 'Q' || board[i][j] == 'B') {
            return true;
        } else if (board[i][j] != '.') {
            break;
        }
    }
    //up left diagonal
    for (int i = xK - 1, j = yK - 1; i >= 0 && j >= 0; i--, j--) {
        if (board[i][j] == 'Q' || board[i][j] == 'B') {
            return true;
        } else if (board[i][j] != '.') {
            break;
        }
    }
    // pawns
    if (xK+1 < 8 && (yK-1 >= 0 && board[xK+1][yK-1] == 'P' || yK+1 < 8 && board[xK+1][yK+1] == 'P')) {
        return true;
    }
    // knights
    if (xK + 1 < 8 && yK + 2 < 8 && board[xK + 1][yK + 2] == 'N') {
        return true;
    }
    if (xK - 1 >= 0 && yK + 2 < 8 && board[xK - 1][yK + 2] == 'N') {
        return true;
    }
    if (xK + 1 < 8 && yK - 2 >= 0 && board[xK + 1][yK - 2] == 'N') {
        return true;
    }
    if (xK - 1 >= 0 && yK - 2 >= 0 && board[xK - 1][yK - 2] == 'N') {
        return true;
    }

    if (xK + 2 < 8 && yK + 1 < 8 && board[xK + 2][yK + 1] == 'N') {
        return true;
    }
    if (xK - 2 >= 0 && yK + 1 < 8 && board[xK - 2][yK + 1] == 'N') {
        return true;
    }
    if (xK + 2 < 8 && yK - 1 >= 0 && board[xK + 2][yK - 1] == 'N') {
        return true;
    }
    if (xK - 2 >= 0 && yK - 1 >= 0 && board[xK - 2][yK - 1] == 'N') {
        return true;
    }
    
    return false;
}

void scanBoard(char (&board)[8][8], int& xK, int& yK)
{
    for (int i = 0; i < 8; i++) {
        for (int j = 0; j < 8; j++) {
            std::cin >> board[i][j];
            if (board[i][j] == 'K') {
                xK = i;
                yK = j;
            }
        }
    }
}

int main()
{
    char board[8][8];
    int xK, yK;

    scanBoard(board, xK, yK);

    if (isKingInCheck(board, xK, yK)) {
        std::cout << "The king is in check" << std::endl;
    } else {
        std::cout << "The king is not in check" << std::endl;
    }

    return 0;
}
