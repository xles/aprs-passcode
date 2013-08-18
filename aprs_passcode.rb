#needs ruby 1.9 due to String#ord
#this file is public domain.
def aprs_passcode(call_sign)
  call_sign.upcase!
  call_sign.slice!(0,call_sign.index('-')) if call_sign =~ /-/
  hash = 0x73e2
  flag = true
  call_sign.split('').each{|c|
    hash = if flag
      (hash ^ (c.ord << 8))
    else
      (hash ^ c.ord)
    end
    flag = !flag
  }
  hash & 0x7fff
end

