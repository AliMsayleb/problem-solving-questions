import static java.lang.Math.max;

//Good morning! Here's your coding interview problem for today.
//This problem was asked by Facebook.
//Given a array of numbers representing the stock prices of a company in chronological order,
//write a function that calculates the maximum profit you could have made from buying and selling that stock once.
// You must buy before you can sell it.
//For example, given [9, 11, 8, 5, 7, 10], you should return 5, since you could buy the stock at 5 dollars and sell it at 10 dollars.

public class StockHighestProfit {
    public static int getHighestProfit(int[] stocks)
    {
        if (stocks.length == 0 || stocks.length == 1) {
            return 0;
        }

        int maxProfit = 0;
        int min = stocks[0];
        int stocksSize = stocks.length;
        for(int i = 1; i < stocksSize; i++) {
            if (stocks[i] > min) {
                maxProfit = max(maxProfit, stocks[i] - min);
            } else {
                min = stocks[i];
            }
        }

        return maxProfit;
    }

    public static void main(String[] args)
    {
//        System.out.println(getHighestProfit(new int[] {9, 11, 8, 5, 7, 10})); // 5
        System.out.println(getHighestProfit(new int[] {8, 11, 8, 5, 6, 2})); // 3
    }
}
