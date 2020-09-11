# Hi, here's your problem today. This problem was recently asked by Uber:
# Given a linked list, determine if the linked list has a cycle in it.
# For notation purposes, we use an integer pos which represents the zero-indexed position where the tail connects to.

class ListNode(object):
  def __init__(self, x):
    self.val = x
    self.next = None

class Solution(object):
  def hasCycle(self, head):
        if head is None or head.next is None or head.next.next is None:
            return False
        slow = head.next
        fast = head.next.next
        while slow is not None and fast is not None:
            if slow == fast:
                return True
            slow = slow.next
            fast = fast.next
            if fast is None:
                return False
            fast = fast.next
        return False

testHead = ListNode(4)
node1 = ListNode(3)
testHead.next = node1
node2 = ListNode(2)
node1.next = node2
node3 = ListNode(1)
node2.next = node3
testTail = ListNode(0)
node3.next = testTail
testTail.next = node1

print(Solution().hasCycle(testHead))
# True
