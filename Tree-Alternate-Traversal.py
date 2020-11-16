# Good morning! Here's your coding interview problem for today.
# This problem was asked by Morgan Stanley.
# In Ancient Greece, it was common to write text with the first line going left to right, the second line going right to left,
# and continuing to go back and forth.
# This style was called "boustrophedon".
# Given a binary tree, write an algorithm to print the nodes in boustrophedon order.
# For example, given the following tree:
#       1
#     /   \
#   2      3
#  / \    / \
# 4   5  6   7
# You should return [1, 3, 2, 4, 5, 6, 7].

class Tree:
    def __init__(self, data):
        self.left = None
        self.right = None
        self.data = data
        
def is_empty(stack):
    return len(stack) == 0

def boustrophedon_tree(head):
    current_stack = []
    next_stack = []
    current_stack.append(head)
    left_to_right = True
    output = "["
    while not is_empty(current_stack):
        while not is_empty(current_stack):
            current_node = current_stack.pop()
            if current_node is None:
                continue
            output = output + str(current_node.data) + ", "
            current_left = current_node.left
            current_right = current_node.right
            if left_to_right:
                next_stack.append(current_left)
                next_stack.append(current_right)
            else:
                next_stack.append(current_right)
                next_stack.append(current_left)
        left_to_right ^= True
        current_stack = next_stack
        next_stack = []
    output = output[:-2]
    return output + "]"


node1 = Tree(1)
node2 = Tree(2)
node3 = Tree(3)
node4 = Tree(4)
node5 = Tree(5)
node6 = Tree(6)
node7 = Tree(7)
node8 = Tree(8)
node9 = Tree(9)
node10 = Tree(10)
node11 = Tree(11)
node12 = Tree(12)
node13 = Tree(13)
node14 = Tree(14)
node15 = Tree(15)

node1.left = node2
node1.right = node3
node2.left = node4
node2.right = node5
node3.left = node6
node3.right = node7
node4.left = node8
node4.right = node9
node5.left = node10
node5.right = node11
node6.left = node12
node6.right = node13
node7.left = node14
node7.right = node15

print(boustrophedon_tree(node1))
